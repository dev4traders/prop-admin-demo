<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Dcat\Admin\Support\Helper;
use Illuminate\Support\Facades\Log;
use App\Models\AffiliateSystem\ReferralCode;

class StoreReferralCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->has('ref') && !Helper::isAjaxRequest() && !$request->hasCookie('ref')){
            try {
                /** @var ReferralCode $referral */
                $referral = ReferralCode::whereCode($request->get('ref'))->first();

                if(is_null($referral)) {
                    return $response;        
                }
                
                $visit = visitor()->visit($referral);
                $response->cookie('ref_code_visit_id', $visit->id);
                $response->cookie('ref', $referral->id, $referral->lifetime_minutes);
            } catch(Exception $ex) {
                Log::critical('StoreReferralCode', ['ex' => $ex->getMessage()]);
            }
        }

        return $response;
    }
}
