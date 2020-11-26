<div>
    {{$slot}}   
@if(session()->has('successMessage'))      
            
    <div class="alert alert-success alert-disimissible fade show" role="alert" id="imgAlertSucess">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session()->get('successMessage')}}</strong>
    </div>
    {{session()->forget('successMessage')}}

@elseif(session()->has('errorMessage'))
    <div class="alert alert-danger alert-disimissible fade show" role="alert" id="imgAlertDanger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session()->get('errorMessage')}}</strong>
    </div>
    {{session()->forget('errorMessage')}}

@elseif(session()->has('warningMessage'))
    <div class="alert alert-warning alert-disimissible fade show" role="alert" id="imgAlertWarning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session()->get('warningMessage')}}</strong>
    </div>
    {{session()->forget('warningMessage')}}
@endif

@if ($errors->any())
    <div class="alert alert-danger d-flex flex-column fade show alert-dismissible" role="alert">
        <button class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>