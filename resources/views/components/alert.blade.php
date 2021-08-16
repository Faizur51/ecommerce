
@if(session('type') && session('message') )
<div class="alert alert-outline-{{session('type')}} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>

    <div class="alert-icon">
        <i class="fa fa-{{session('type')=='success'?'check':'times'}}"></i>
    </div>
    <div class="alert-message">
        <span><strong>{{session('type') =='success'?'Success!':'Danger!'}}</strong> {{session('message')}} </span>
    </div>
</div>

@endif
