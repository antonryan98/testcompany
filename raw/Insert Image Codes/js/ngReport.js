angular.module('App',['angularUtils.directives.dirPagination'])

   .config(['$interpolateProvider',function ($interpolateProvider) {
                $interpolateProvider.startSymbol('[[');
                $interpolateProvider.endSymbol(']]');
                }])

    
      .controller('controller',function($scope,$log,$http,$timeout){



   $scope.user_detail={};
$scope.getImage=function()
{
  console.log("image");


                          $http({
               method:"GET",
               url:'get-image'
               
           
           }).success(function(response){
            $scope.user_view=response;
         console.log($scope.user_view);  
           }).error(function(data){
                       
               //console.log(data,status);
           });
}
$scope.getImage2=function()
{
  console.log("image");


                          $http({
               method:"GET",
               url:'get-image2'
               
           
           }).success(function(response){
            $scope.user_view=response;
         console.log($scope.user_view);  
           }).error(function(data){
                       
               //console.log(data,status);
           });
}
  $scope.sendUserId=function(id)
  {

                        $http({
               method:"POST",
               url:'view-get-user-byID-2',
               data:id
               
           
           }).success(function(response){
     
            $scope.user_detail=response;
 $scope.footer_show_div=true;
         console.log($scope.user_detail);  
           }).error(function(data){
                       
               //console.log(data,status);
           });
  }

  $scope.sendUserId2=function(id)
  {

                        $http({
               method:"POST",
               url:'view-get-user-byID-2',
               data:id
               
           
           }).success(function(response){
     
            $scope.user_detail=response;
 $scope.footer_show_div=true;
         console.log($scope.user_detail);  
           }).error(function(data){
                       
               //console.log(data,status);
           });
  }

  $scope.cancel_button=function()
  {
    console.log("hiding");
     $scope.footer_show_div=false;
  }
  $scope.deleteUser=function(data_delete)
  {
$http({
               method:"POST",
               url:'delete-user',
               data:data_delete
               
           
           }).success(function(response){

            $scope.getImage();
            $scope.delete_status=true;
              $timeout(function (){
           $scope.delete_status=false;
                            }, 4000);
           }).error(function(data){
                       
               //console.log(data,status);
           });
        
  }


    $scope.pdfData=function()
  {
                 $http({
               method:"POST",
               url:'pdf-data'
               
           
           }).success(function(response){
           
         console.log(response);  
           }).error(function(data){
                       
               //console.log(data,status);
           });
  }

      });


           