<section class="page-section official-form-106c padd-20" id="official-form-106c">

    <form name="official_frm_106c" id="official_frm_106c" class="official_frm_106c_first" action="{{route('generate_official_pdf')}}" method="post">
        @csrf
        <input type="hidden" name="form_id" value="106c">
        <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
        <input type="hidden" name="sourcePDFName" value="<?php echo 'form_b_106c.pdf'; ?>">
        <input type="hidden" name="clientPDFName" value="<?php echo $client_id . '_b_106c.pdf'; ?>">
        <input type="hidden" name="<?php echo base64_encode('Case number'); ?>" value="<?php echo $caseno; ?>">
        <input type="hidden" name="<?php echo base64_encode('Debtor 1'); ?>" value="<?php echo $onlyDebtor; ?>">
        <input type="hidden" name="<?php echo base64_encode('Debtor 2'); ?>" value="<?php echo $spousename; ?>">

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="section-box">
                        <div class="section-header bg-back text-white">
                            <p class="font-lg-20">Fill in this information to identify your case</p>
                        </div>
                        <div class="section-body padd-20">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label>United States Bankruptcy Court for the</label>
                                        <select class="form-control district-select" name="<?php echo base64_encode('Bankruptcy District Information'); ?>" id="district_name"> @foreach ($district_names as $district_name)
                                            <option <?php echo Helper::validate_key_option('district_attorney', $savedData, $district_name->district_name); ?> value="{{$district_name->district_name}}" class="form-control">{{$district_name->district_name}}</option> @endforeach
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="amended">
                        <input type="checkbox" name="<?php echo base64_encode('Check if this is an'); ?>">
                        <label>Check if this is an amended filing</label>
                    </div>
                </div>
            </div>
            <div class="row padd-20">
                <div class="col-md-12 mb-3">
                    <div class="form-title">
                        <h4>Schedule C</h4>
                        <!-- <h4>Official Form 106C </h4> -->
                        <h2 class="font-lg-22">Schedule C: The Property You Claim as Exempt
                        </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-subheading">
                        <p class="font-lg-14">Be as complete and accurate as possible. If two married people are filing together, both are equally responsible for supplying correct information. Using the property you listed on Schedule A/B: Property (Official Form 106A/B) as your source, list the property that you claim as exempt. If more space is needed, fill out and attach to this page as many copies of Part 2: Additional Page as necessary. On the top of any additional pages, write your name and case number (if known). </p>
                        <p class="font-lg-14"><strong>For each item of property you claim as exempt,
                                you
                                must specify the amount of the exemption you claim. One way of doing
                                so
                                is to state a
                                specific dollar amount as exempt. Alternatively, you may claim the
                                full
                                fair market value of the property being exempted up to the amount
                                of any applicable statutory limit. Some exemptions—such as those for
                                health aids, rights to receive certain benefits, and tax-exempt
                                retirement funds—may be unlimited in dollar amount. However, if you
                                claim an exemption of 100% of fair market value under a law that
                                limits the exemption to a particular dollar amount and the value of
                                the
                                property is determined to exceed that amount, your exemption
                                would be limited to the applicable statutory amount. </strong> </p>
                    </div>
                </div>
            </div>

            <!-- Part 1 -->
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="part-form-title mb-3"> <span>Part 1</span>
                        <h2 class="font-lg-18">Identify the Property You Claim as Exempt
                        </h2>
                    </div>
                </div>
            </div>
            <div class="form-border mb-3">
                <!-- Row 1 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group d-inline-block">
                            <label for=""> <strong class="d-block">1. Which set of exemptions are you claiming?
                                </strong> Check one only, even if your spouse is filing with you. </label>
                        </div>
                        <div class="input-group">
                            <div class="input-group">
                                <input name="<?php echo base64_encode('check 1'); ?>" value="state and federal" type="checkbox">
                                <label>You are claiming state and federal nonbankruptcy exemptions. 11 U.S.C. § 522(b)(3)</label>
                            </div>
                            <div class="input-group">
                                <input name="<?php echo base64_encode('check 1'); ?>" value="federal" type="checkbox">
                                <label>You are claiming federal exemptions. 11 U.S.C. § 522(b)(2)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">state
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group">
                                <label><strong class="d-block">2. For any property you list on
                                        Schedule
                                        A/B that you claim as exempt, fill in the information
                                        below.</strong></label>
                            </div>
                        </div>
                    </div>
                    <table class="table custom-table">
                        <tr class="column-heading">
                            <td>
                                <div class="input-group"> <strong>Brief description of the property and line on
                                        Schedule A/B that lists this property</strong> </div>
                            </td>
                            <td>
                                <div class="input-group"> <strong>Current value of the
                                        portion you own</strong>
                                    <p>Copy the value from Schedule A/B</p>
                                </div>
                            </td>
                            <td>
                                <div class="input-group"> <strong>Amount of the exemption you claim</strong> <i>Check only one box for each exemption</i> </div>
                            </td>
                            <td>
                                <div class="input-group"> <strong>Specific laws that allow exemption</strong> </div>
                            </td>
                        </tr>
                        <tbody>

                        <?php if(!empty($propertyresident)) {
                                foreach($propertyresident as $residence){
                                    $address = Helper::validate_key_value('Address',$BasicInfoPartA);
                                    if ($residence['not_primary_address'] ==1) {
                                        $address = $residence["mortgage_address"];
                                    }
                                ?>
                        <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_6'); ?>" type="text" value="<?php echo $address;?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Schedule AB_5'); ?>" type="text" value="<?php echo  $residence['form_ab_line_no']; ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_27'); ?>" type="text" value="" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 6'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_28'); ?>" type="text" value="" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 6'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $clothing, 'comma'); ?>"></div>
                                @include("components.exemtionPopup")
                                <textarea name="<?php echo base64_encode('5'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <?php } 
                }?>


                            <?php if(!empty($propertyvehicle)) {
                                foreach($propertyvehicle as $vehicle){
                                ?>
                        <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_6'); ?>" type="text" value="<?php echo $vehicle['property_make'].' '.$vehicle['property_model'].' '.$vehicle['property_mileage']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Schedule AB_5'); ?>" type="text" value="<?php echo  $vehicle['form_ab_line_no']; ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_27'); ?>" type="text" value="" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 6'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_28'); ?>" type="text" value="" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 6'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $clothing, 'comma'); ?>"></div>
                                @include("components.exemtionPopup")
                                <textarea name="<?php echo base64_encode('5'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <?php } }?>

                            <tr>
                                <td>
                                    <div class="input-group">
                                        <label class="font-lg-14">Brief description:</label>
                                        <div class="input-group">
                                            <input name="<?php echo base64_encode('description'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $household_goods); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label class="font-lg-14">Line from Schedule A/B:</label>
                                        <div class="input-group">
                                            <input name="<?php echo base64_encode('Schedule AB'); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $household_goods); ?>" class="form-control">
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <div class="input-group d-flex">
                                        <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                        <input name="<?php echo base64_encode('undefined'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $household_goods, 'comma'); ?>" class="price-field form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group d-flex">
                                        <input name="<?php echo base64_encode('oiuy'); ?>" value="On" type="checkbox">
                                        <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                        <input name="<?php echo base64_encode('undefined_2'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $household_goods, 'comma'); ?>" class="price-field form-control">
                                    </div>
                                    <div class="input-group d-flex">
                                        <input name="<?php echo base64_encode('check 2.1'); ?>" value="fair market" type="checkbox">
                                        <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $household_goods, 'comma'); ?>"></div>
                                        @include("components.exemtionPopup")
                                        <textarea name="<?php echo base64_encode('2.1'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <label class="font-lg-14">Brief description:</label>
                                        <div class="input-group">
                                            <input name="<?php echo base64_encode('description_2'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $electronics); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label class="font-lg-14">Line from Schedule A/B:</label>
                                        <div class="input-group">
                                            <input name="<?php echo base64_encode('Schedule AB_2'); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $electronics); ?>" class="form-control">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group d-flex">
                                        <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                        <input name="<?php echo base64_encode('undefined_6'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $electronics, 'comma'); ?>" class="price-field form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group d-flex">
                                        <input name="<?php echo base64_encode('check 2.2'); ?>" value="On" type="checkbox">
                                        <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                        <input name="<?php echo base64_encode('undefined_7'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $electronics, 'comma'); ?>" class="price-field form-control">
                                    </div>
                                    <div class="input-group d-flex">
                                        <input name="<?php echo base64_encode('check 2.2'); ?>" value="fair market" type="checkbox">
                                        <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $electronics, 'comma'); ?>"></div>
                                        @include("components.exemtionPopup")
                                        <textarea name="<?php echo base64_encode('2.2'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input name="<?php echo base64_encode('description_3'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $collectibles); ?>" class="form-control">
                </div>
            </div>
            <div class="input-group">
                <label class="font-lg-14">Line from Schedule A/B:</label>
                <div class="input-group">
                    <input name="<?php echo base64_encode('Schedule AB_3'); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $collectibles); ?>" class="form-control">
                </div>
            </div>
            </td>
            <td>
                <div class="input-group d-flex">
                    <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                    <input name="<?php echo base64_encode('undefined_8'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $collectibles, 'comma'); ?>" class="price-field form-control">
                </div>
            </td>
            <td>
                <div class="input-group d-flex">
                    <input name="<?php echo base64_encode('check 2.3'); ?>" value="On" type="checkbox">
                    <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                    <input name="<?php echo base64_encode('undefined_9'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $collectibles, 'comma'); ?>" class="price-field form-control">
                </div>
                <div class="input-group d-flex">
                    <input name="<?php echo base64_encode('check 2.3'); ?>" value="fair market" type="checkbox">
                    <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                </div>
            </td>
            <td>
                <div class="input-group">
                    <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $collectibles, 'comma'); ?>"></div>
                    <div class="exemp-sel-options">
                        <div class="table-cols-cs">
                            <div class="table-head-cs row">
                                <div class="col-md-5">
                                    <h3>Description</h3>
                                </div>
                                <div class="col-md-3">
                                    <h3>Statute</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>Unused Amount </h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>Exemption limit</h3>
                                </div>
                            </div>
                            <div class="exemp-sel-row">
                            </div>
                        </div>
                    </div>
                    <textarea name="<?php echo base64_encode('2.3'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                </div>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
        <!-- Row 3 -->
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="input-group">
                    <label><strong class="d-block">3. Are you claiming a homestead exemption
                            of more than $170,350?</strong>(Subject to adjustment on 4/01/22 and every 3 years after that for cases filed on or after the date of adjustment.)</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group">
                    <input name="<?php echo base64_encode('check 3'); ?>" value="no" type="checkbox">
                    <label>No</label>
                </div>
                <div class="input-group">
                    <input name="<?php echo base64_encode('check 3'); ?>" value="yes" type="checkbox">
                    <label>Yes. Did you acquire the property covered by the exemption within 1,215 days before you filed this case? </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group">
                    <input name="<?php echo base64_encode('check 3-1'); ?>" value="no" type="checkbox">
                    <label>No</label>
                </div>
                <div class="input-group">
                    <input name="<?php echo base64_encode('check 3-1'); ?>" value="yes" type="checkbox">
                    <label>Yes </label>
                </div>
            </div>
        </div>
        <h3 style="text-align:right;">Page 1 of 4 </h3>
        </div>


        <!-- Part 2 -->
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="part-form-title mb-3"> <span>Part 2</span>
                    <h2 class="font-lg-18">Additional Page
                    </h2>
                </div>
            </div>
        </div>
        <div class="form-border pr-0 pl-0 mb-3">
            <table class="table custom-table">
                <tr class="column-heading">
                    <td>
                        <div class="input-group"> <strong>Brief description of the property and line on
                                Schedule A/B that lists this property</strong> </div>
                    </td>
                    <td>
                        <div class="input-group"> <strong>Current value of the
                                portion you own</strong>
                            <p>Copy the value from Schedule A/B</p>
                        </div>
                    </td>
                    <td>
                        <div class="input-group"> <strong>Amount of the exemption you cl <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_6'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $clothing); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Schedule AB_5'); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $clothing); ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_27'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $clothing, 'comma'); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 6'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_28'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $clothing, 'comma'); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 6'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $clothing, 'comma'); ?>"></div>
                                @include("components.exemtionPopup")
                                <textarea name="<?php echo base64_encode('5'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>aim</strong> <i>Check only one box for each exemption</i> </div>
                    </td>
                    <td>
                        <div class="input-group"> <strong>Specific laws that allow exemption</strong> </div>
                    </td>
                </tr>
                <tbody>
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_4'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $sports); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Line from'); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $sports); ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_11'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $sports, 'comma'); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 4'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_12'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $sports, 'comma'); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 4'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $sports, 'comma'); ?>"></div>
                                @include("components.exemtionPopup")
                                <textarea name="<?php echo base64_encode('3'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_5'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $firearms); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Schedule AB_4'); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $firearms); ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_13'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $firearms, 'comma'); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 5'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_26'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $firearms, 'comma'); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 5'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $firearms, 'comma'); ?>"></div>
                                @include("components.exemtionPopup")
                                <textarea name="<?php echo base64_encode('4'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_6'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $clothing); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Schedule AB_5'); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $clothing); ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_27'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $clothing, 'comma'); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 6'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_28'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $clothing, 'comma'); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 6'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $clothing, 'comma'); ?>"></div>
                                @include("components.exemtionPopup")
                                <textarea name="<?php echo base64_encode('5'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_7'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $jewelry); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Line from_2'); ?>" name="<?php echo base64_encode(''); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $jewelry); ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_29'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $jewelry, 'comma'); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 7'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_30'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $jewelry, 'comma'); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 7'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $jewelry, 'comma'); ?>"></div>
                                @include("components.exemtionPopup")
                                <textarea name="<?php echo base64_encode('6'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_8'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $pets); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Schedule AB_6'); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $pets); ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_31'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $pets, 'comma'); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 8'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_32'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $pets, 'comma'); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 8'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $pets, 'comma'); ?>"></div>
                                @include("components.exemtionPopup")
                                <textarea name="<?php echo base64_encode('7'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_9'); ?>" type="text" value="<?php echo Helper::validate_key_value('description', $health_aids); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Schedule AB_7'); ?>" type="text" value="<?php echo Helper::validate_key_value('form_ab_line_no', $health_aids); ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_34'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $health_aids, 'comma'); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 9'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_35'); ?>" type="text" value="<?php echo Helper::validate_key_value('property_value', $health_aids, 'comma'); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 9'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::validate_key_value('property_value', $health_aids, 'comma'); ?>"></div>
                                <textarea name="<?php echo base64_encode('8'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <!-- Row end -->
                    <?php
                    if (!empty($financial_assests)) {
                        foreach ($financial_assests as $k => $financial) {
                            $ab_line_no = '';
                            if (!is_array($financial['description'])) { ?>
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <label class="font-lg-14">Brief description:</label>
                                            <div class="input-group">
                                                <input name="<?php echo base64_encode('description_11'); ?>" type="text" value="<?php echo $financial['description']; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <label class="font-lg-14">Line from Schedule A/B:</label>
                                            <div class="input-group">
                                                <input name="<?php echo base64_encode('Schedule AB_8'); ?>" type="text" value="<?php echo $financial['form_ab_line_no']; ?>" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group d-flex">
                                            <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                            <input name="<?php echo base64_encode('undefined_38'); ?>" type="text" value="<?php echo $financial['property_value'][0]; ?>" class="price-field form-control">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group d-flex">
                                            <input name="<?php echo base64_encode('check 11'); ?>" value="On" type="checkbox">
                                            <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                            <input name="<?php echo base64_encode('undefined_39'); ?>" type="text" value="<?php echo $financial['property_value'][0]; ?>" class="price-field form-control">
                                        </div>
                                        <div class="input-group d-flex">
                                            <input name="<?php echo base64_encode('check 11'); ?>" value="fair market" type="checkbox">
                                            <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                            @include("components.exemtionPopup")
                                            <textarea name="<?php echo base64_encode('10'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                                        </div>
                                    </td>
                                </tr>

                            <?php  } else {
                                foreach ($financial['description'] as $key => $value) {
                                    $ab_line_no = $ab_line_no == '' ? ($financial['form_ab_line_no'] + .1) : ($ab_line_no + .1);

                                ?>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <label class="font-lg-14">Brief description:</label>
                                                <div class="input-group">
                                                    <input name="<?php echo base64_encode('description_11'); ?>" type="text" value="<?php echo $value; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                                <div class="input-group">
                                                    <input name="<?php echo base64_encode('Schedule AB_8'); ?>" type="text" value="<?php echo $ab_line_no; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group d-flex">
                                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                                <input name="<?php echo base64_encode('undefined_38'); ?>" type="text" value="<?php echo Helper::priceFormtWithComma($financial['property_value'][$key]); ?>" class="price-field form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group d-flex">
                                                <input name="<?php echo base64_encode('check 11'); ?>" value="On" type="checkbox">
                                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                                <input name="<?php echo base64_encode('undefined_39'); ?>" type="text" value="<?php echo Helper::priceFormtWithComma($financial['property_value'][$key]); ?>" class="price-field form-control">
                                            </div>
                                            <div class="input-group d-flex">
                                                <input name="<?php echo base64_encode('check 11'); ?>" value="fair market" type="checkbox">
                                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                                @include("components.exemtionPopup")
                                                <textarea name="<?php echo base64_encode('10'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                            <?php }
                        }
                    }
                    } ?>
                    <!-- Row end -->
                    <!-- Row end -->
                    <?php if (!empty($commercial_assets)) {
                        foreach ($commercial_assets as $k => $commercial) {
                            
                    ?>
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_12'); ?>" type="text" value="<?php echo $description =  array_key_exists("description",$commercial) ? $commercial['description'] : '' ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Schedule AB_9'); ?>" type="text" value="<?php echo $commercial['form_ab_line_no']; ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_40'); ?>" type="text" value="<?php echo $property_value =  array_key_exists("property_value",$commercial) ? Helper::priceFormtWithComma($commercial['property_value']) : '' ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 12'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_41'); ?>" type="text" value="<?php echo $property_value =  array_key_exists("property_value",$commercial) ? Helper::priceFormtWithComma($commercial['property_value']) : '' ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 12'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                @include("components.exemtionPopup")
                                <textarea name="<?php echo base64_encode('11'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <?php } } ?>
                    <!-- Row end -->
                    <!-- Row end -->
                    <?php if (!empty($misc_assets)) {
                        foreach ($misc_assets as $k => $misc) {
                            
                    ?>
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('description_13'); ?>" type="text" value="<?php echo $misc['description']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input name="<?php echo base64_encode('Line from_4'); ?>" type="text" value="<?php echo $misc['form_ab_line_no']; ?>" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_42'); ?>" type="text" value="<?php echo $misc['form_ab_line_no']; ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 13'); ?>" value="On" type="checkbox">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input name="<?php echo base64_encode('undefined_43'); ?>" type="text" value="<?php echo Helper::priceFormtWithComma($misc['property_value']); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input name="<?php echo base64_encode('check 13'); ?>" value="fair market" type="checkbox">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma($misc['property_value']); ?>"></div>
                                <textarea name="<?php echo base64_encode('12'); ?>" id="" cols="15" rows="4" class="exemption-by-attorney form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    <?php }
                    }
                    ?>
                   
                </tbody>
            </table>

            <h3 style="text-align:right;">Page 2 of 4 </h3>
        </div>
        </div>
    </form>



    <form name="official_frm_106c_add_1" id="official_frm_106c_add_1" class="official_frm_106c" action="{{route('generate_official_pdf')}}" method="post">
        @csrf
        <input type="hidden" name="form_id" value="106c_add_1">
        <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
        <input type="hidden" name="sourcePDFName" value="<?php echo 'form_b_106c_add_1.pdf'; ?>">
        <input type="hidden" name="clientPDFName" value="<?php echo $client_id . '_b_106c_add_1.pdf'; ?>">
        <input type="hidden" name="<?php echo base64_encode('Case number'); ?>" value="<?php echo $caseno; ?>">
        <input type="hidden" name="<?php echo base64_encode('Debtor 1'); ?>" value="<?php echo $onlyDebtor; ?>">
        <input type="hidden" name="<?php echo base64_encode('Debtor 2'); ?>" value="<?php echo $spousename; ?>">

        <!-- Part 3 -->
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="part-form-title mb-3"> <span>Part 2</span>
                    <h2 class="font-lg-18">Additional Page
                    </h2>
                </div>
            </div>
        </div>
        <div class="form-border pl-0 pr-0 mb-3">
            <table class="table custom-table">
                <tr class="column-heading">
                    <td>
                        <div class="input-group"> <strong>Brief description of the property and line on
                                Schedule A/B that lists this property</strong> </div>
                    </td>
                    <td>
                        <div class="input-group"> <strong>Current value of the
                                portion you own</strong>
                            <p>Copy the value from Schedule A/B</p>
                        </div>
                    </td>
                    <td>
                        <div class="input-group"> <strong>Amount of the exemption you claim</strong> <i>Check only one box for each exemption</i> </div>
                    </td>
                    <td>
                        <div class="input-group"> <strong>Specific laws that allow exemption</strong> </div>
                    </td>
                </tr>
                <tbody>
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_4'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Line from'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_11'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="On" name="<?php echo base64_encode('check 4'); ?>">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_12'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 4'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea id="" name="<?php echo base64_encode('3'); ?>" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_5'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_4'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_13'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 5'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_26'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 5'); ?>" value="Off">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('4'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_6'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_5'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_27'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 6'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_28'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 6'); ?>" value="Off">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('5'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_7'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Line from_2'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_29'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 7'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_30'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 7'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('6'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_8'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_6'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_31'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 8'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_32'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 8'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('7'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_9'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_7'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_34'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 9'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_35'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 9'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('8'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_10'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Line from_3'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_36'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 10'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_37'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 10'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('9'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_11'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_8'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_38'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 11'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_39'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 11'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('10'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_12'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_9'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_40'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 12'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_41'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 12'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('11'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_13'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Line from_4'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_42'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 13'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_43'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 13'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('12'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_14'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_10'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_44'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 14'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_45'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 14'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('13'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_15'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_11'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_47'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 15'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_48'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 15'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <input type="hidden" name="<?php echo base64_encode('page 2'); ?>" value="3">
                        <input type="hidden" name="<?php echo base64_encode('page') ?>" value="4">
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('14'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                </tbody>
            </table>
            <h3 style="text-align:right;">Page 3 of 4 </h3>


        </div>
    </form>

    <form name="official_frm_106c_add_2" id="official_frm_106c_add_2" class="official_frm_106c" action="{{route('generate_official_pdf')}}" method="post">
        @csrf
        <input type="hidden" name="form_id" value="106c_add_2">
        <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
        <input type="hidden" name="sourcePDFName" value="<?php echo 'form_b_106c_add_2.pdf'; ?>">
        <input type="hidden" name="clientPDFName" value="<?php echo $client_id . '_b_106c_add_2.pdf'; ?>">
        <input type="hidden" name="<?php echo base64_encode('Case number'); ?>" value="<?php echo $caseno; ?>">
        <input type="hidden" name="<?php echo base64_encode('Debtor 1'); ?>" value="<?php echo $onlyDebtor; ?>">
        <input type="hidden" name="<?php echo base64_encode('Debtor 2'); ?>" value="<?php echo $spousename; ?>">


        <!-- Part 3 -->
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="part-form-title mb-3"> <span>Part 2</span>
                    <h2 class="font-lg-18">Additional Page
                    </h2>
                </div>
            </div>
        </div>
        <div class="form-border pl-0 pr-0 mb-3">
            <table class="table custom-table">
                <tr class="column-heading">
                    <td>
                        <div class="input-group"> <strong>Brief description of the property and line on
                                Schedule A/B that lists this property</strong> </div>
                    </td>
                    <td>
                        <div class="input-group"> <strong>Current value of the
                                portion you own</strong>
                            <p>Copy the value from Schedule A/B</p>
                        </div>
                    </td>
                    <td>
                        <div class="input-group"> <strong>Amount of the exemption you claim</strong> <i>Check only one box for each exemption</i> </div>
                    </td>
                    <td>
                        <div class="input-group"> <strong>Specific laws that allow exemption</strong> </div>
                    </td>
                </tr>
                <tbody>
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_4'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Line from'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_11'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="On" name="<?php echo base64_encode('check 4'); ?>">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_12'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 4'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea id="" name="<?php echo base64_encode('3'); ?>" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_5'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_4'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_13'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 5'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_26'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 5'); ?>" value="Off">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('4'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_6'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_5'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_27'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 6'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_28'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 6'); ?>" value="Off">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('5'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_7'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Line from_2'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_29'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 7'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_30'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 7'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('6'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_8'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_6'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_31'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 8'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_32'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 8'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('7'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_9'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_7'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_34'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 9'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_35'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 9'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('8'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_10'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Line from_3'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_36'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 10'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_37'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 10'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('9'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_11'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_8'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_38'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 11'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_39'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 11'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('10'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_12'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_9'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_40'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 12'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_41'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 12'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('11'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_13'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Line from_4'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_42'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 13'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_43'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 13'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('12'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_14'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_10'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_44'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 14'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_45'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 14'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('13'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="font-lg-14">Brief description:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('description_15'); ?>" value="" class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="font-lg-14">Line from Schedule A/B:</label>
                                <div class="input-group">
                                    <input type="text" name="<?php echo base64_encode('Schedule AB_11'); ?>" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_47'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group d-flex">
                                <input type="checkbox" name="<?php echo base64_encode('check 15'); ?>" value="On">
                                <div class="input-group-append"> <span class="input-group-text" id="basic-addon2">$</span> </div>
                                <input type="text" name="<?php echo base64_encode('undefined_48'); ?>" value="<?php echo Helper::priceFormtWithComma(''); ?>" class="price-field form-control">
                            </div>
                            <div class="input-group d-flex">
                                <input type="checkbox" value="Off" name="<?php echo base64_encode('check 15'); ?>">
                                <label for=""> 100% of fair market value, up to any applicable statutory limit </label>
                            </div>
                        </td>
                        <input type="hidden" name="<?php echo base64_encode('page 2'); ?>" value="4">
                        <input type="hidden" name="<?php echo base64_encode('page') ?>" value="4">
                        <td>
                            <div class="input-group">
                                <div class="exemp_select" data-optionid="<?php echo Helper::priceFormtWithComma(''); ?>"></div>
                                <div class="exemp-sel-options">
                                    <div class="table-cols-cs">
                                        <div class="table-head-cs row">
                                            <div class="col-md-5">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>Statute</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Unused Amount </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3>Exemption limit</h3>
                                            </div>
                                        </div>
                                        <div class="exemp-sel-row">
                                        </div>
                                    </div>

                                </div>
                                <textarea name="<?php echo base64_encode('14'); ?>" id="" cols="15" rows="4" class="form-control exemption-by-attorney"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- Row end -->
                </tbody>
            </table>

            <h3 style="text-align:right;">Page 4 of 4 </h3>


        </div>
    </form>


    <div class="row align-items-center" style="margin-left:1px;">
        <div class="form-title mb-9" style="margin-top:15px;">
            <button type="submit" onclick="generateIndividualPDF('official_frm_106c_first','official_frm_106c')" style="cursor:pointer; border: 2px solid #012cae; background-color: #fff; color:#012cae; padding:10px; font-weight: bold" class="float-right ml-2 print-hide">
                <span class="card-title-text">Generate Schedule C (Exemptions) PDF</span>
            </button>
        </div>
    </div>
</section>

<style>
    table.table.custom-table tbody {
        position: relative;
    }

    .exemp-sel-options {
        position: absolute;
        background: #fff;
        left: 12px;
        right: 12px;
        border: 1px solid #000;
        top: 47px;
        z-index: 1;
        display: none;
    }

    .exemp-sel-options .row {
        margin: 0;
    }

    .table-head-cs>div {
        background: #EDEEF0;
    }

    .exemp-sel-options .table-head-cs h3 {
        padding: .2rem 0;
        /* color: #414141; */
        font-weight: 600;
    }

    .table-body-cs-inner>div {
        padding-top: 5px;
        padding-bottom: 5px;
        border-bottom: 1px solid #eaeaea;
    }

    .table-body-cs-inner p {
        margin: 0;
        color: #414141;
        font-weight: normal;
        font-size: 13px;
    }

    .table-body-cs-inner.row:hover {
        background: #0a95ff;
    }

    .table-body-cs-inner.row:hover * {
        color: #fff;
    }

    table.table.custom-table tbody tr {
        position: relative;
    }

    .table-body-cs-inner.row {
        cursor: pointer;
    }

    /* button.btn.btn-primary.exemption-sel {
    border: 1px solid #f00;
    border-radius: 5px;
    position: relative;
    padding-right: 20px;
} */

    button.btn.btn-primary.exemption-sel {
        border-radius: 5px;
        position: relative;
        padding-right: 25px;
        min-height: 35px;
        width: 100%;
        text-overflow: ellipsis;
        display: -webkit-box !important;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 35px;
    }

    .exemp-red {
        border: 1px solid #f00;
    }

    .exemp-green {
        border: 1px solid #388711;
    }

    button.btn.btn-primary.exemption-sel:after {
        content: "";
        height: 10px;
        width: 10px;
        border-style: solid;
        border-color: #000;
        border-width: 0px 1.5px 1.5px 0px;
        transform: rotate(45deg);
        transition: border-width 150ms ease-in-out;
        position: absolute;
        right: 10px;
        top: 9px;
    }
</style>