<?php
    /*******************************************************************
    Angular
    ********************************************************************/
?>
<?php 
    include("rest/db.class.php");
?>
<html>    
<head>    
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js" type="text/javascript"></script>    
    <script src="js/app.js" type="text/javascript"></script>      
</head>
<body>
    <div ng-app="myApp" ng-controller="listingCtrl" id="main" data-ng-init="populate()">
        <div class="{{active}}" >
            <!-- list in listing is just like $key => $val -->
            <form id="listingForm" name="listingForm"  ng-submit="postListing($index, field);">
            
                <div class="row nav-group">
                    <div class="col-md-5 nav-col">
                        <div class="row">
                            <div class="nav-label col-md-12">
                                <div class="col-md-3 lbl-add"><a href="#" id="addInformation" ng-click="showAdd();">ADD INFORMATION</a></div>
                                <div class="col-md-1 nav-divider">&nbsp;</div>
                                <div class="col-md-3 lbl-listing"><a href="#" id="displayListing" ng-click="showListing();">LISTING PAGE</a></div>
                            </div> 
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="row form-group">
                    <!------------------- BLUE HEADER ------------------------------>
                    <div class="col-md-5 confirm-header" ng-show="confirm==true">
                        <div class="confirm-center">
                            <div class="confirm-text">
                                Your data is saved.  Go to listing page to see.
                            </div>
                        </div>
                    </div>
                    <!-------------------------------------------------------------->
                    
                    <!------------------------- ADD INFORMATION -------------------->
                    <div class="col-md-5 main-col">
                        <div ng-show="showadd==true">
                            <div class="row">
                                <div class="form-label col-md-10 lbl-name"><label for="inputName">NAME<span class="lbl-star">*</span> </label></div> 
                                <div class="form-element col-md-11"><input type="text" name="name" ng-model="field.name" class="form-control" id="inputName"  placeholder="" required ng-minlength="2"   /></div>
                            </div> 
                            <div class="row">
                                <div class="col-md-11 form-spacer1"><span class="error-msg" ng-show="listingForm.name.$error.minlength">The value is too short</span></div>
                            </div>       
                            <div class="row">
                                <div class="form-label col-md-11 lbl-province">
                                    <label for="inputProvince">PROVINCE<span class="lbl-star">*</span> </label>
                                </div> 
                                <div class="form-element col-md-11">
                                    <select name="province_id" required ng-model="field.province_id" class="form-control" id="inputProvinceId">
                                        <option value=""></option>
                                        <option value="1">Ontario</option>
                                        <option value="2">Quebec</option>
                                        <option value="3">Nova Scotia</option>
                                        <option value="4">New Brunswick</option>
                                        <option value="5">Manitoba</option>
                                        <option value="6">British Columbia</option>
                                        <option value="7">Prince Edward Island</option>
                                        <option value="8">Saskatchewan</option>
                                        <option value="9">Alberta</option>
                                        <option value="10">Newfoundland and Labrador</option>
                                        <option value="11">Northwest Territories</option>
                                        <option value="12">Yukon</option>
                                        <option value="13">Nunavut</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-11 form-spacer2">&nbsp;</div>
                            </div>   
                            <div class="row lbl-phone-postal">
                                <div class="form-label col-md-5 lbl-telephone"><label for="inputPostal">TELEPHONE<span class="lbl-star">*</span> </label></div>
                                <div class="form-label col-md-5"><label for="inputPostal">POSTAL CODE<span class="lbl-star">*</span> </label></div> 
                            </div>                         
                            <div class="row">
                                <div class="form-element col-sm-5 telephone-container">
                                    <input type="text" name="telephone" ng-model="field.telephone" class="form-control" id="inputTelephone" placeholder="" required ng-pattern="/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/" />
                                </div>
                                <div class="form-element col-md-5 postal_code-container">
                                    <input type="text" name="postal_code" ng-model="field.postal_code" class="form-control" id="inputPostal" placeholder="" required ng-pattern="/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i" />
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-5 form-spacer3">
                                    <span class="error-msg" ng-show="listingForm.telephone.$error.pattern">Wrong Phone Format</span>
                                </div>
                                <div class="col-sm-5 form-spacer3">
                                    <span class="error-msg" ng-show="listingForm.postal_code.$error.pattern">Wrong Postal Code Format</span>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-label col-md-10 lbl-salary"><label for="inputSalary">SALARY<span class="lbl-star">*</span> </label></div> 
                                <div class="form-element col-md-11"><input type="text" name="salary" ng-model="field.salary" class="form-control" id="inputSalary" placeholder="" required ng-pattern="/^(\d*\.?\d+|\d{1,3}(,\d{3})*(\.\d+)?)$/" /></div>
                            </div>
                            <div class="row">
                                <div class="form-label col-md-8"><span class="error-msg" ng-show="listingForm.salary.$error.pattern">Wrong Salary Format</span>&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="form-label col-md-8">&nbsp;</div> 
                                <div class="form-element col-md-3 submit-container"><button type="submit" class="btn btn-primary btn-submit">SAVE</button></div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------->
                        
                        
                        <!------------------------ ADD CONFIRMATION -------------------->
                        <div ng-show="confirm==true" class="confirmation">
                            <div class="row">
                                <div class="col-md-2 lbl-confirm"><label for="inputName">Name </label></div>
                                <div class="col-md-1 confirm-colon">:</div> 
                                <div class="name col-md-8">{{ confirmation.name }}</div>
                            </div>
                            <div class="row">
                                <div class="form-label col-md-8 confirm-spacer1">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 lbl-confirm"><label for="inputName">Province </label></div>
                                <div class="col-md-1 confirm-colon">:</div>
                                <div class="col-md-8"><span>{{ confirmation.province_name || 'empty' }}</span></div>
                            </div>
                            <div class="row">
                                <div class="form-label col-md-8 confirm-spacer2">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 lbl-confirm"><label for="inputName">Telephone </label></div>
                                <div class="col-md-1 confirm-colon">:</div>
                                <div class="col-md-8"><span>{{ confirmation.telephone || 'empty' }}</span></div>
                            </div>
                            <div class="row">
                                <div class="form-label col-md-8 confirm-spacer3">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 lbl-confirm"><label for="inputName">Postal Code </label></div>
                                <div class="col-md-1 confirm-colon">:</div>
                                <div class="col-md-8"><span>{{ confirmation.postal_code || 'empty' }}</span></div>
                            </div>
                             <div class="row">
                                <div class="form-label col-md-8 confirm-spacer4">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 lbl-confirm"><label for="inputName">Salary </label></div>
                                <div class="col-md-1 confirm-colon">:</div>
                                <div class="col-md-8"><span>{{ confirmation.salary || 'empty' }}</span></div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------->
                    </div>
                    
                    <!------------------------ DISPLAY LISTING -------------------------->
                    <div class="listing-pagination">
                        <div class="col-md-8 listing-container">
                            <div class="listing-info-header-background">
                                <div class="row listing-info-header">
                                    <div class="name col-md-2">Name</div>
                                    <div class="province_id col-md-2"><span>Province</span></div>
                                    <div class="telephone col-md-2"><span>Telephone</span></div>
                                    <div class="postal_code col-md-2"><span>Postal code</span></div>
                                    <div class="salary col-md-2"><span>Salary</span></div>
                                </div>
                            </div>
                            <div ng-repeat="list in listing" class="row listing-repeat">  
                                <div class="row listing-info">     
                                    <div class="name col-md-2">{{ list.name }}</div>
                                    <div class="province_id col-md-2"><span>{{ list.province_name || 'empty' }}</span></div>
                                    <div class="telephone col-md-2"><span>{{ list.telephone || 'empty' }}</span></div>
                                    <div class="postal_code col-md-2"><span>{{ list.postal_code || 'empty' }}</span></div>
                                    <div class="salary col-md-2"><span>{{ list.salary || 'empty' }}</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 listing-line"></div>
                                </div>
                            </div>
                        </div>
                    
                                          
                        <div class="pagination" ng-show="pagination==true">
                            <ul>    
                                <li class="prev" ng-click="count = navStart - 10; populate(count, 'prev')"><a href="">&nbsp;</a></li
                                ><li ng-repeat="num in page" ng-click="setSelected(num); populate(num);count = num;" ng-class="{'page-current': num == selectedObject}" class="page page-{{num}}"> 
                                    <a href="">{{$index + 1}}</a>
                                </li
                                ><li class="next" ng-click="count = navStart + 10; populate(count, 'next');"><a href="">&nbsp;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-------------------------------------------------------------->                  
                </div>
            </form>
      



        </div>
        
      
    </div>
</body>
</html>