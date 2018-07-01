<!--CODED BY ANKUR GUPTA (gupta.ankur792@gmail.com)-->

@extends('demo_dashboard')

@push('js')

  <script src="angular.js" type="text/javascript"></script>

 
 <script src="ngform.js" type="text/javascript"></script>

  <style>

    [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-    ng-cloak {
        display: none !important;
    }
.selected {
  background-color: red;
}
    </style>
@endpush
@section('content')
@section('content')
 @if (Session::has('user_insert'))
   <div class="alert alert-success" id="aler">{{ Session::get('user_insert') }}<span class="fa fa-check"></span></div>
@endif
<div class="row" ng-controller="controller" ng-cloak>
    
   <section class="content-header">
      <h1>
      <span class="fa fa-user" style="padding:10px;color:#21B2AB"></span>  Add Image Demo @ <em>Ankur Gupta</em>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Using Laravel + Angular + Bootstrap 3</li>
      </ol>
    </section>
<br/>
     <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Using Laravel + Angular + Bootstrap 3</h3>
            </div>
            <!-- /.box-header -->
             {!! Form::open(array('url' => 'insert-image','files' => true)) !!}
              <div class="box-body">

   


                <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-2 control-label"  >Name</label>

                  <div class="col-xs-10">
                    <div class="input-group date">
                  {!!  Form::text ('name', null, array(
                    
                    'class'=>'form-control',
                    
                    'style'=>'color:blue; font-size:14px;font-weight:bold',
                    'required'
                    ))
                    !!} 

                      <span class="input-group-addon">
    <span class="fa fa-user"></span> 
  </span>

</div>
              
         <br/>
                  </div>
                </div>
  
          <div class="form-group">
                  <label   class="col-sm-2 control-label"  >Date Of Birth</label>

                  <div class="col-xs-10">
                   <div class="input-group date">
                  {!!  Form::text ('date_of_birth', null, array(
                    'id' => 'datepicker',
                    'class'=>'form-control',
                  
                    'style'=>'color:blue; font-size:14px;font-weight:bold',
                    
                    ))
                    !!} 

       <span class="input-group-addon">
    <span class="fa fa-birthday-cake"></span> 
  </span>

</div>
         <br/>
                  </div>
                </div>
  




               <div class="form-group">
                  <label  class="col-sm-2 control-label" >Gender</label> 
                          <div class="col-sm-10">
                                  <div class="input-group date">
                           {!! Form::select('gender', array(
                   
                    'male' => 'Male',
                    'female' => 'Female',
                    
                  ),
                     null, array('class'=>'form-control')) !!}

    <span class="input-group-addon">
    <span class="glyphicon glyphicon-user"></span> 
  </span>

</div>

                <br/> 

              </div>
                </div>    
             


         


              <div class="form-group">
                  <div class="col-xs-2">
                    <label for="inputEmail3"  class="col-sm-2 control-label"  >Photo</label>
                  </div>

                     <div class="col-xs-3">
                 <input type="button" name="" value="Browse Photo" id="browse_file" class="btn btn-primary form-control">

                  </div>

           <div class="col-xs-7">

            <img src="" id="img" class="img img-responsive center-block" style="height:160px; width:140 px;" >

<input type="file" name="photo" id="photo" style="display:none">
         <br/>
                  </div>



             
                </div>


   



                   
              </div>
              <!-- /.box-footer -->
                              <div class="box-footer">
                
                <button  type="submit" class="btn btn-info center-block" >ADD NEW STUDENT<span class="fa fa-plus-circle" style="padding-left:10px;"></span></button>
               
              
              </div>  
                  
                        {!! Form::close() !!}   


          </div>
</div>
</div>


@endsection


@push('jj')

<script type="text/javascript">
     $("#aler").fadeTo(3000, 500).slideUp(500, function(){
    $("#aler").slideUp(500);
  });
  $(function() {



    $( "#datepicker" ).datepicker();
  });
  
   $('#browse_file').on('click',function(e){
  $('#photo').click();
})

$('#photo').on('change',function(e){

  var fileInput=this;
    if(fileInput.files[0])
{

  var reader=new FileReader();
  reader.onload=function(e)
    {
      
      $('#img').attr('src',e.target.result);
    }

reader.readAsDataURL(fileInput.files[0]);
}

})
//FRONT ID IMAGE CODING

   $('#browse_file_f').on('click',function(e){
  $('#photo_f').click();
})

$('#photo_f').on('change',function(e){

  var fileInput=this;
    if(fileInput.files[0])
{

  var reader=new FileReader();
  reader.onload=function(e)
    {
      
      $('#img_f').attr('src',e.target.result);
    }

reader.readAsDataURL(fileInput.files[0]);
}

})


//BACK ID IMAGE CODING

   $('#browse_file_b').on('click',function(e){
  $('#photo_b').click();
})

$('#photo_b').on('change',function(e){

  var fileInput=this;
    if(fileInput.files[0])
{

  var reader=new FileReader();
  reader.onload=function(e)
    {
      
      $('#img_b').attr('src',e.target.result);
    }

reader.readAsDataURL(fileInput.files[0]);
}

})


//BACK ID IMAGE CODING

   $('#browse_file_s').on('click',function(e){
  $('#photo_s').click();
})

$('#photo_s').on('change',function(e){

  var fileInput=this;
    if(fileInput.files[0])
{

  var reader=new FileReader();
  reader.onload=function(e)
    {
      
      $('#img_s').attr('src',e.target.result);
    }

reader.readAsDataURL(fileInput.files[0]);
}

})
</script>
@endpush
  