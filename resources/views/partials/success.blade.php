@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
        <strong>
            {!! session()->get('success') !!}
        </strong>
      </div>
@endif