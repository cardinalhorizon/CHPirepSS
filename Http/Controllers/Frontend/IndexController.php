<?php

namespace Modules\CHPirepSS\Http\Controllers\Frontend;

use App\Contracts\Controller;
use App\Models\Pirep;
use App\Models\Enums\PirepSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class $CLASS$
 * @package
 */
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function acarstomanual(Request $request, $id)
    {
        // check if auth user is valid
        $pirep = Pirep::find($id);
        if ($pirep->user_id !== Auth::user()->id)
            abort(401);

        $pirep->source = PirepSource::MANUAL;
        $pirep->save();
        return to_route('frontend.pireps.edit', [$pirep]);
    }
}
