<?php
/**
 * Template Name: Pricing Page JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header('standard-new'); ?>

<div id="content">
            
  <div id="main" role="main">

    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>

	<div class="row-wide no-padding-top block-text block">
    <div class="row">
	<div class="small-12 medium-10 medium-offset-1 large-8 large-offset-2 columns">
<div style="margin: 0 auto;">
<center>
<script src="//app-sj05.marketo.com/js/forms2/js/forms2.js"></script>
<form id="mktoForm_1088"></form>
<script>MktoForms2.loadForm("//app-sj05.marketo.com", "568-BVY-995", 1088, function(form){
      /*Start Demandbase Form Connector Implementation*/
  window.dbAsyncInit = function() {
    var dbf = Demandbase.Connectors.WebForm;
    dbf.connect({
      /*Form Connector Configuration*/
      emailID: "Email",   /* These can be name or ID */  
      companyID: "Company",
      key: '9415d4693cd4e7c07a21c0f9d2c5eb97',
      fieldMap: {
        'company_name': '', /* These can be name or ID */
        'industry': 'Industry',
        'sub_industry': '',
        'primary_sic': 'SICCode',
        'revenue_range': 'revenueRange',
        'annual_sales': '',
        'employee_range': '',
        'employee_count': 'NumberOfEmployees',
        'street_address': '',
        'city': '',
        'state': '',
        'zip': 'PostalCode',
        'country': '',
        'country_name': '',
        'latitude': '',
        'longitude': '',
        'phone': '',
        'web_site': 'Website',
        'stock_ticker': '',
        'traffic': '',
        'b2b': '',
        'b2c': '',
        'fortune_1000': '',
        'forbes_2000': '',
        'duns_num': '',
        'demandbase_sid': 'demandbaseSID',
        'data_source': '',
        'audience': '',
        'audience_segment': ''
      },
      toggleFieldList: [
        'exampleFieldID1', /*Field IDs*/
        'exampleFieldID2'
      ],
      getToggleElement: function(id) {
        return ((this.djq('.mktoFormCol').length > 0) ? this.djq('#'+id).parents('.mktoFormCol') : this.djq('#'+id).parents('li'));
      },
      getToggleFieldValue: function(id) {
        return this.djq('#'+id).val();
      },
      formNameList:["mktoForm_1035", "mktoForm_1088"] //ADD MORE NAMES TO FORMS THEN ADD THE NAME HERE 
	
    });
  };

  (function() {
    var dbt = document.createElement('script'); dbt.type = 'text/javascript'; 
    dbt.async = true; dbt.id = 'demandbase-form';
    dbt.src = ('https:'==document.location.protocol?'https://':'http://')+'scripts.demandbase.com/formWidget.js'; 
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(dbt, s);
  })();

  
});

</script>
</center>
</div>
	</div>
  </div>
	</div>

    </div> <!-- end #main --> 

</div> <!-- end #content -->
	
<?php get_footer('standard-new'); ?>