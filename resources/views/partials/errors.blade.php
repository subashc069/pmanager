<div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>    
    @endif
</div>

{{-- @if (isset($errors) && count($errors) >0 )
    <div class="alert alert-danger" role="">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
        @foreach ($errors->all() as $error)
            <li><strong>{!! $error !!}</strong></li>
        @endforeach
    </div>
@endif --}}