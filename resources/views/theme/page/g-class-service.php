<?php include('config.php'); ?>

<?php include('inc/head.php'); ?>

<title>Mercedes Benz | SM</title>

<meta name="description" content="">
<style>
    .ltr-container {
        direction: ltr;
    }
    .carousel-inner{
        height: 400px;
    }
    .carousel-control {
        background-image: none !important;
    }
    .footerTopSec {
        display: none;
    }

    .panel-title span {
        margin-left: 10px;
    }

    small {
        font-size: 70% !important;
    }

    .custom-file {
        cursor: pointer;
        line-height: 40px !important;
    }
</style>

<?php include('inc/header_landing.php'); ?>

<div class="container white-text">
    <div class="row">
        <div class="col-xs-12">

            <div class="breadcrumb promo-eng">
                <ul>
                    <li><a href="#">Complaint</a></li>
                </ul>
            </div>

            <div class="clearfix"></div><br><br>

            <div class="page-body">

                <div class="row">
                    <div class="col-xs-12">


                        <!-- slider but check if it works?
						<div id="ug-theme-slider1" style="display:none;">
                                <img alt=""
                                    src="image url here"
                                    data-image="image url here"
                                    data-description="">
                        </div>-->


                        <div class="topBanner">
                            <div class="entry-thumbnail">
                                <img src="https://www.mercedesbenzksa.com/uploads/zY8rGZnF678Y.jpg" class="img-responsive" alt="banner">
                            </div>
                        </div>


                        <div class="clearfix"></div><br>

                        <br><br>

                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="_mt-0 pri-text">Complaint</h1>

                                <div class="clearfix"></div><br>

                                <p>
                                    كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.
                                </p>

                                <div class="clearfix"></div><br>

                               <!-- <ul class="list-style-1">

                                    <li>
                                        <img src="<?php /*echo $config_path; */?>img/icons/2.png" alt="...">
                                        بإمكانك إستبدال سيارتك الحالية
                                    </li>

                                    <li>
                                        <img src="<?php /*echo $config_path; */?>img/icons/1.png" alt="...">
                                        تتوفر لدينا عقود صيانة برسوم اضافية
                                    </li>

                                </ul>-->
                            </div>

                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-4">
                                <ul class="tot_pri_ins">
                                    <!-- Price side-->
                                    <div class="clearfix"></div><br><br>
                                </ul>
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <!--<h4>ملاحظات:</h4>
                        <ul class="list-style-2">
                            <li>الأسعار تشمل ضريبة القيمة المضافة.<br></li>
                            <li>تتوفر العروض التمويلية عن طريق شركات تمويلية.</li><li>يسري هذا العرض على كمية محدودة.<br></li><li>تطبق الشروط والأحكام.*</li>

                        </ul>-->
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="get" class="campaign_frm_lead" onsubmit="return ajaxSubmit();" id="campaign_frm_lead" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>
                                            <span class="pull-right"><span>*</span>Name</span>
                                            <span class="pull-left">الاسم<span>*</span></span>
                                        </label>
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <span class="pull-right"><span>*</span>Email</span>
                                            <span class="pull-left">البريد الإلكتروني<span>*</span></span>
                                        </label>
                                        <input type="email" class="form-control" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <span class="pull-right"><span>*</span>Mobile Number</span>
                                            <span class="pull-left">رقم الجوال<span>*</span></span>
                                        </label>
                                        <input type="text" class="form-control promo-eng text-left" placeholder="053 XXX XXXX" name="mobile">
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <span class="pull-right"><span>*</span>Branch Name</span>
                                            <span class="pull-left">الفرع<span>*</span></span>
                                        </label>
                                        <select class="form-control promo-eng" name="branch_id">
                                            <option value="">اختر</option>
                                            <option value="2129">Abha  &nbsp;&nbsp;&nbsp;&nbsp; ابها - طريق خميس مشيط / أبها السريع</option>
                                            <option value="2140">Dammam &nbsp;&nbsp;&nbsp;&nbsp; الدمام - طريق الدمام / الخبر السريع</option>
                                            <option value="2123">Jeddah - Automall &nbsp;&nbsp;&nbsp;&nbsp; جدة - أوتو مول</option>
                                            <option value="2120">Jeddah - Madina Road &nbsp;&nbsp;&nbsp;&nbsp; جدة - طريق المدينة</option>
                                            <option value="2100">Riyadh - Khurais &nbsp;&nbsp;&nbsp;&nbsp; الرياض - طريق خريص</option>
                                            <option value="2101">Riyadh - Uroubah &nbsp;&nbsp;&nbsp;&nbsp; الرياض - طريق العروبة</option>
                                            <option value="2124">Medina Almounawarah &nbsp;&nbsp;&nbsp;&nbsp; المدينة المنورة - صالة عرض المدينة</option>
                                        </select>
                                    </div>

                                    <div class="form-group vehicle">
                                        <label>
                                            <span class="pull-right"><span>*</span>Vehicle</span>
                                            <span class="pull-left">السيارة<span>*</span></span>
                                        </label>

                                        <select class="form-control promo-eng" name="vehicle_ids" id="vehicle_ids">
                                            <option value="">اختر</option>
                                            <option class="" value="A-Class Hatchback">A-Class Hatchback</option>
                                            <option class="" value="A-Class Sedan">A-Class Sedan</option>
                                            <option class="" value="C-Cab">C-Cab</option>
                                            <option class="" value="C-Class">C-Class</option>
                                            <option class="" value="C-Coupe">C-Coupe</option>
                                            <option class="" value="CLA">CLA</option>
                                            <option class="" value="CLS">CLS</option>
                                            <option class="" value="E-Cab">E-Cab</option>
                                            <option class="" value="E-Class">E-Class</option>
                                            <option class="" value="E-Coupe">E-Coupe</option>
                                            <option class="" value="G-Class">G-Class</option>
                                            <option class="" value="GL">GL</option>
                                            <option class="" value="GLA">GLA</option>
                                            <option class="" value="GLC">GLC</option>
                                            <option class="" value="GLC Coupe">GLC Coupe</option>
                                            <option class="" value="GLE">GLE</option>
                                            <option class="" value="GLE Coupe">GLE Coupe</option>
                                            <option class="" value="GLK">GLK</option>
                                            <option class="" value="GLS">GLS</option>
                                            <option class="" value="GT 4Doors Coupe">GT 4Doors Coupe</option>
                                            <option class="" value="GT Cab">GT Cab</option>
                                            <option class="" value="GT Coupe">GT Coupe</option>
                                            <option class="" value="Maybach">Maybach</option>
                                            <option class="" value="ML">ML</option>
                                            <option class="" value="S-Cab">S-Cab</option>
                                            <option class="" value="S-Class">S-Class</option>
                                            <option class="" value="S-Coupe">S-Coupe</option>
                                            <option class="" value="SLC">SLC</option>
                                            <option class="" value="SLK">SLK</option>
                                            <option class="" value="V-Class">V-Class</option>
                                            <option class="" value="Viano">Viano</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>

                                    <!--<div class="form-group">
                                        <label>
                                            <span class="pull-right"><span></span>Message</span>
                                            <span class="pull-left"><span></span>رسالة</span>
                                        </label>
                                        <textarea rows="5" class="form-control" name="comments"></textarea>
                                    </div>-->

                                    <div class="form-group">
                                        <label>
                                            <span class="pull-right"><span>*</span>Complaint Details</span>
                                            <span class="pull-left">تفاصيل الشكوى<span>*</span></span>
                                        </label>
                                        <textarea rows="5" class="form-control" name="complaint"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <span class="pull-right"><span>*</span>Social Media Channel</span>
                                            <span class="pull-left">قناة التواصل الاجتماعي<span>*</span></span>
                                        </label>
                                        <input type="text" class="form-control promo-eng text-left" placeholder="" name="social_media_channel">
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <span class="pull-right"><span>*</span>SM Account/URL</span>
                                            <span class="pull-left">رابط حساب التواصل الاجتماعي<span>*</span></span>
                                        </label>
                                        <input type="text" class="form-control promo-eng text-left" placeholder="" name="sm_account_url">
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <span class="pull-right"><span></span>Upload Attachments</span>
                                            <span class="pull-left">تحميل المرفقات<span></span></span>
                                        </label>
                                        <label style="margin-top: -15px;">
                                            <span class="pull-right"><small>JPG, PNG, DOC, DOCX, PDF</small></span>
                                        </label>
                                        <label style="margin-top: -15px;">
                                            <span class="pull-right"><small>(Control + select for multiple files)</small></span>
                                        </label>

                                        <label class="btn btn-pri custom-file" dir="ltr">
                                            <input type="file" multiple class="form-control promo-eng text-left" placeholder="" name="attachments[]" style="display: none;">
                                            <span>Files الملفات</span>
                                        </label>
                                    </div>

                                    <div class="g-recaptcha" data-sitekey="<?=$captcha_site_key;?>"></div>
                                    <br>
                                    <div class="form-group text-center">
                                        <input type="submit" class="btn btn-pri" value="إرسال Submit">
                                    </div>


                                    <!--<select name="branch_id" class="hide">
                                        <option value="50|0">to connect to call center manager and sub manager</option>
                                    </select>-->

                                    <input type="hidden" name="frm_from_ksa_com" value="1">
                                    <input type="hidden" name="source_id" value="11"> <!--Online & Digital-->
                                    <input type="hidden" name="event_id" value="42">
                                    <input type="hidden" name="http_referer" value="">
                                    <input type="hidden" name="is_vehicle_specific" value="0">
                                    <input type="hidden" name="created_id" value="0">
                                    <input type="hidden" name="code" value="-2">
                                    <input type="hidden" name="action" value="save_sap">
                                    <input type="hidden" name="category_id" value=""><!--New Cars Enquiry-->
                                    <input type="hidden" name="r" value="sm"><!--for thankyou page-->
                                    <input type="hidden" name="t" value="الرجوع للصفحة الرئيسية"><!--for thankyou page-->
                                    <input type="hidden" name="page_name" value=""><!--for page name-->
                                    <input type="hidden" name="is_complaint" value="1"><!--for page name-->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div><br><br>

            </div>

        </div>
    </div>
</div>
<script>
    $(function(){
        $('[name="attachments[]"]').change(function(){
            var text = 'Choose file(s)';
            if($(this)[0].files.length) {
                text = $(this)[0].files.length + ' file(s) selected.';
            }
            $(this).parent().find('span').text(text);
        });
    });
</script>
<?php include('inc/footer.php'); ?>
        
