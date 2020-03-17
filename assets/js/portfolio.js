jQuery(document).ready(function(){

    jQuery(".filter-button").click(function(){
         value = jQuery(this).attr('data-filter');
        
        if(value == "all")
        {
            jQuery('.filter').show('1000');
        }
        else
        {
            jQuery(".filter").not('.'+value).hide('3000');
            jQuery('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if (jQuery(".filter-button").removeClass("active")) {
        jQuery(this).removeClass("active");
    }
    jQuery(this).addClass("active");

});

