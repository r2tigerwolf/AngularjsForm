var app = angular.module('myApp', []);
var baseurl = "access_rest.php"; 
var lastpage = '';

app.controller('listingCtrl', function($scope, $http) {

    // GET
    $scope.populate = function(start) {
        
        if((start < 0) || (typeof(start) == 'undefined')) {
            start = 0;
        }
        
        $http.get(baseurl + '/get?start=' + start)
        .then(function (response) {
            
            var page = [];
            var j = 1;
            
            lastpage = response.data.records[0]["total_row"];
            if(start > lastpage) {
                start = (Math.round(lastpage / 10) * 10);
            }
            
            angular.element(document.querySelector(".page-current")).removeClass("page-current");
            angular.element(document.querySelector(".page-current")).removeClass("page-current");
            angular.element(document.querySelector(".page-" + start)).addClass("page-current"); 
            
            $scope.listing = response.data.records;

            for(var i = 0; i < lastpage; i += 10) {
                page.push(i);
                j++;
            }
            
            $scope.navStart = start;
            $scope.page = page; 
        });
    }

    $scope.selectInfo=function(page){
        return (page);
    }
    
    $scope.showadd = true;
    $scope.confirm = false;
    $scope.pagination = false;
    
    if($scope.confirm) {
        angular.element(document.querySelector(".main-col")).addClass("confirmCol");
    }
    
    $scope.showConfirm = function(){
        $scope.showadd = false;
        $scope.confirm = true;                                                
        $scope.pagination = false;                                            
        angular.element(document.querySelector(".main-col")).addClass("confirmCol");                                                                                       
        angular.element(document.querySelector(".main-col")).removeClass("hide-main-col"); 
        angular.element(document.querySelector(".listing-container")).removeClass("show-list"); 
    }  
    
    $scope.showAdd = function(){
        $scope.showadd = true;                                                   
        $scope.confirm = false;                                                  
        $scope.pagination = false;
        angular.element(document.querySelector(".main-col")).removeClass("confirmCol");                                                               
        angular.element(document.querySelector(".main-col")).removeClass("hide-main-col"); 
        angular.element(document.querySelector(".listing-container")).removeClass("show-list");       
    }    

    $scope.showListing = function(){
        $scope.showadd = false;
        $scope.confirm = false;
        $scope.pagination = true;
        angular.element(document.querySelector(".main-col")).addClass("hide-main-col");
        angular.element(document.querySelector(".listing-container")).addClass("show-list");
    }
    
    
        
    $scope.setSelected = function(object) {
        $scope.selectedObject = object
    }

    $scope.markActive = function(object, $event) {
        object.active = !object.active;
        $event.stopPropagation();
        $event.preventDefault();
    };
    
    
    // Reset Form
    $scope.reset = function() {
        $scope.field.name = '';
        $scope.field.province_id = '';
        $scope.field.telephone = '';
        $scope.field.postal_code = '';
        $scope.field.salary = '';
    };

    // PUT
    $scope.putListing = function ($index, field) {
        $http({
            method: 'POST',
            data: {
                'id' : $scope.listing[$index].id,
                'name' : $scope.listing[$index].name,
                'province_id' : $scope.listing[$index].province_id,
                'telephone' : $scope.listing[$index].telephone,
                'postal_code' : $scope.listing[$index].postal_code,
                'salary' : $scope.listing[$index].salary
            },
            url: baseurl + '/put',
            headers : {'Content-Type': 'application/json'} 
        });
	};
    
    // POST
    $scope.postListing = function ($index, field) {  
        if($scope.listingForm.$valid === true) {                                
            $http({
                method: 'POST',
                data: {
                    'id' : null,
                    'name' : field.name,
                    'province_id' : field.province_id,
                    'telephone' : field.telephone,
                    'postal_code' : field.postal_code,
                    'salary' : field.salary
                },
                url: baseurl + '/post'
            }).then(function(response) {
                $scope.showConfirm(); 
                $scope.reset();
                                                                                
                $scope.confirmation = response.data;
                //console.log(response.data);           
            });
        }     
	};
    
    // DELETE
    $scope.deleteListing = function ($index, field) {
        $http({
            method: 'POST',
            data: {
                'id' : $scope.listing[$index].id
            },
            url: baseurl + '/delete',
            headers : {'Content-Type': 'application/json'} 
        }).then(function(response) {
            $scope.listing.pop(); 
        });
	};
    
});