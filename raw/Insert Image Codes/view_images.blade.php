@extends('demo_dashboard')
@push('js')

  <script src="angular.js" type="text/javascript"></script>

 
 <script src="ngReport.js" type="text/javascript"></script>

   <script src="dirPagination.js"  type="text/javascript"></script>

  <style>

    [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-    ng-cloak {
        display: none !important;
    }

    </style>
@endpush
@section('content')

@section('content')
 @if (Session::has('user_update'))
   <div class="alert alert-success" id="aler">{{ Session::get('user_update') }}<span class="fa fa-check"></span></div>
@endif


<div class="row" ng-controller="controller" ng-cloak>
    
   <section class="content-header">
      <h1>
       View User Recored
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View User</li>
      </ol>
    </section>
<br/>
     <div class="col-md-12" ng-init="getImage2()">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">View user_id</h3>
            </div>
            <!-- /.box-header -->
             
              <div class="box-body">


             

    <div class="container-fluid" style="height: 600px; overflow-y: auto">
         <div class="form-group">
                      
                        <input type="text" ng-model="search" class="form-control" placeholder="Search Anything About Student" style="border-color:#5A5A5A;"" id="test" >
                    </div>
     <table class="table table-striped table-responsive" >
    <thead>
      <tr>
       <th>ID</th>
        <th  ng-click="sort('name')">Name</th>
        <th>Image</th>
        <th>Gender</th>
       
        <th>EDIT</th>
        <th>DELETE</th>
       
      </tr>
    </thead>
    <tbody>
      <tr   dir-paginate="data in user_view|orderBy:sortKey:reverse|filter:search|itemsPerPage:4">
      <td>[[data.id]]</td>
        <td>[[data.name]]</td>
        <td><a href="uploads/photo/[[data.image]]"><img src="uploads/photo/[[data.image]]" style="width:100px;height:80px"></a></td>
        
        <td>[[data.gender]]</td>
        

         <td><button class="btn btn-warning"  ng-click="sendUserId2(data.id)" >Update <span class="fa fa-pencil"></span></button></td>
        <td><button class="btn btn-danger"  ng-click="deleteUser(data)" >Delete <span class="fa fa-times"></span></button></td>

      </tr>
      
    </tbody>
  </table>
<dir-pagination-controls
                    max-size="4"
                    direction-links="true"
                    boundary-links="true" >
                </dir-pagination-controls>
     </div>        


              </div> <!--THIS IS BOX BODY DIV-->
              <!-- /.box-footer -->
                              <div class="box-footer" ng-show="footer_show_div">
<label class="label label-danger" ng-show="delete_status">User Details Successfully Deleted </label>
       <!-- /.box-header -->
             {!! Form::open(array('url' => 'view-update-user',
               'ng-repeat'=>'cc in user_detail'
             )) !!}
      

   <div class="form-group" >
             
              
                  <label for="inputEmail3"  class="col-sm-2 control-label"  >Registration ID</label>

                  <div class="col-xs-10" >
                  {!!  Form::text ('reg_id', null, array(
                    
                    'class'=>'form-control',
                    'ng-model'=>'cc.id',
                    'style'=>'color:blue; font-size:14px;font-weight:bold',
                    'readonly'
                    ))
                    !!} 
              
         <br/>
                  </div>
                </div>


                        <div class="form-group">
                  <label   class="col-sm-2 control-label"  >Name</label>

                  <div class="col-xs-10">
                  {!!  Form::text ('name', null, array(
                    
                    'class'=>'form-control',
                    'ng-model'=>'cc.name',
                    'style'=>'color:blue; font-size:14px;font-weight:bold',
                    'required'
                    ))
                    !!} 
              
         <br/>
                  </div>
                </div>


              

                           <div class="form-group clearfix">
                  <label  class="col-sm-2 control-label" >Gender</label> 
                          <div class="col-sm-10">
                                  <div class="input-group date">
                           {!! Form::select('gender', array(
                   
                    'male' => 'Male',
                    'female' => 'Female',
                   
                  ),
                     null, array('class'=>'form-control', 'ng-model'=>'cc.gender')) !!}

    <span class="input-group-addon">
    <span class="glyphicon glyphicon-user"></span> 
  </span>

</div>

                <br/> 

              </div>
                </div>    







              <div class="form-group clearfix">
                  <div class="col-xs-2">
                    <label for="inputEmail3"  class="col-sm-2 control-label"  >Photo</label>
                  </div>

                   

           <div class="col-xs-7">

       <a href=" uploads/photo/[[cc.image]]">     <img src="uploads/photo/[[cc.image]]" id="img" class="img img-responsive center-block" style="height:160px; width:140 px;" > </a>

<input type="file" name="photo" id="photo" style="display:none">
         <br/>
                  </div>
  <div class="col-xs-3">
            
                  </div>

               </div>





   <div class="form-group clearfix">
            <div class="col-xs-6">
<button type="submit" class="btn btn-warning center-block">UPDATE RECORD</button>
     
            </div>

       <div class="col-xs-6">
            
     <a href="#" class="btn btn-success" ng-click="cancel_button()">CANCEL</a>

            </div>
             
                </div>



</div>
      
                  
     {!! Form::close() !!}
            
                       
                    </div><!--LOCKER FORM SHOW -->
               

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
  
</script>
@endpush
  