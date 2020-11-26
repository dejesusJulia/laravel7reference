@if (session()->has('successMessage'))                    
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
@endif