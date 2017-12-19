jQuery(document).ready(function($) {
	//FontAwesome Icon Control JS
    $('body').on('click', '.cosmica-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.cosmica-icon-list').prev('.cosmica-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.cosmica-icon-list').next('input').val(icon_class).trigger('change');
    });

    $(document).on('click', '.cosmica-selected-icon', function(){
        $(this).next().slideToggle();
    });

    //Switch Control
    $(document).on('click', '.onoffswitch', function(){
        var $this = $(this);
        if($this.hasClass('switch-on')){
            $(this).removeClass('switch-on');
            $this.next('input').val('off').trigger('change')
        }else{
            $(this).addClass('switch-on');
            $this.next('input').val('on').trigger('change')
        }
    });

    $(document).on('click', '.cosmica_go_to_section', function (event) {
        event.preventDefault();
        var id = jQuery(this).attr('href');
        if( typeof(id) != 'undefined' ) {
            jQuery(id).find('h3').trigger('click');
        }
    });
    
});
