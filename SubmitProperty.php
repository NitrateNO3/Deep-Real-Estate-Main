<? include 'include/header.php'; ?>

    <!-- Submit Property Detail Start -->
        <section class="submit-property-wrapper index inner-section-padding">
            <div class="container">
                <h2 class="main-title text-center"> Submit Properties</h2>
                <form>
                    <h5>Property description and price</h5>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-8 form-group">
                            <label>Property Title *</label>
                            <input type="text" name="pname" id="pname">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <label>Property on *</label>
                            <select id="purpose" name="purpose">
                                                            <option value="on Sale">Sale</option>
                                                            <option value="on Rent">Rent</option>
                                                        </select>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-2 form-group">
                            <label>Property Type *</label>
                            <select  id="ptype" name="ptype">
                                                            <option value='2'>Residential</option>
                                                            <option value='1'>Commercial</option>
            
                                                        </select>
                        </div>
<div class="col-xs-6 col-sm-4 col-md-3 form-group">
                            <label>Sub-Type *</label>
                             <select  id="subtype" name="subtype">
                                                            <?=getPropertyTypes(2); ?>
            
                                                        </select>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                            <label>City *</label>
                             <select  id="city" name="city">
                                                            <?=getCityList(); ?>
            
                                                        </select>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <label>Location *</label>
                             <select  id="location" name="location">
                                                            <?=getLocationList(1); ?>
            
                                                        </select>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-8 form-group">
                            <label>Address</label>
                           <input type="text" id="sublocation"  name="sublocation">
                        </div>
                        <div class="col-xs-6 col-sm-2 col-md-2 form-group">
                            <label>Size</label>
                            <input type="text" id="psize"  name="psize"></div>
                            <div class="col-xs-6 col-sm-2 col-md-2 form-group">
                                <label>&nbsp;</label>
                            <select  id="unit" name="unit">
                                                            <?=getUnitList(); ?>
                                                        </select>
                        </div>
                        
                        <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                            <label>Possession</label>
                           <select  id="movein" name="movein">
                                                            <option value="Under-Construction">Under Construction</option>
                                                        <option value="Winin 6 Month">Winin 6 Month</option>
                                                        <option value="Raw">Raw</option>
                                                        <option value="Immediate">Immediate</option>
                                                        </select>
                        </div><div class="col-xs-6 col-sm-4 col-md-5 form-group">
                            <label>Builder *</label>
                             <select  id="did" name="did">
                                                            <?=getDevelopetrsList(); ?>
                                                        </select>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-2 form-group">
                            <label>Price *</label>
                            <input type="text" id="price" class="form-control" name="price"> 
                                                        </div><div class="col-xs-6 col-sm-4 col-md-2 form-group">
                                                            <label>&nbsp;</label>
                                                        <select class="form-select" id="unit1" name="unit1">
                                                            <?=getUnitList(); ?>
                                                        </select>
                        </div>
                      
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label>Property Descriptions *</label>
                            <textarea id="details" name="details"></textarea>
                        </div>
                        
                    </div>

                    <h5>Property Amenities</h5>
                        <div class="col-xs-12 col-sm-12 col-md-12 form-group"> <ul class="amenities form-group">
                            <? $t6=DB::query("SELECT * FROM amenities WHERE ame_name<>''");
                            foreach($t6 as $t){
                            echo '<li>
                                <label> &nbsp;'.$t['ame_name'].'
                                    <input type="checkbox" class="ameVal" name="'.$t['ame_name'].'">
                                    <span class="checkmark"></span>
                                </label>
                            </li>'; } ?>
                            
                          
                        </ul></div>
                
                    <h5 style="margin-top:50px">Agent/Owner Details</h5>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                            <label>Contact Name</label>
                            <input type="text" id="contact_person" name="contact_person">
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                            <label>Contact Number</label>
                            <input type="text" id="contact_no" name="contact_no">
                        </div>
                    </div>
                    <button id="SubmitPropertybyUser" class="btn-1 flat-btn submit">
                        <span>submit property</span>
                    </button>
                </form>
            </div>
        </section>
    <!-- Submit Property Detail Start -->

   <? include 'include/footer.php'; ?>