<?php

namespace Modules\CHPirepSS\Widgets;

use App\Contracts\Widget;
use App\Models\Enums\PirepSource;
use App\Models\Enums\PirepState;
use App\Models\Pirep;
use Illuminate\Support\Facades\Auth;

class ActivePirepWarning extends Widget
{
    public function run() {
        $user = Auth::user();

        $pirep = Pirep::where(['user_id' => $user->id, 'state' => PirepState::IN_PROGRESS, 'source' => PirepSource::ACARS])->first();

        return view ("chpirepss::pirep_warning",['pirep' => $pirep]);
    }
}
