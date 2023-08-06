@if(session()->has('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div>
            {{session()->get('success')}}<br>
        </div>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            @foreach($errors->all() as $error)
                <div>
                    {{$error}}
                </div>
            @endforeach
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            {{session()->get('error')}}<br>
        </div>
    </div>
@endif
