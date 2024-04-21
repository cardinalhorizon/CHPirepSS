@if($pirep !== null)
<div class="alert alert-warning">
    {{$pirep->ident}} is currently active via {{$pirep->source_name}}. If you encountered an issue with {{$pirep->source_name}} and you need to manually submit, click
    the button to convert your ACARS pirep to a manual pirep.
    <a class="btn btn-success mt-4 mx-auto" href="{{route('chpirepss.atm', $pirep->id)}}">Convert {{$pirep->ident}} To Manual PIREP</a>
</div>
@endif
