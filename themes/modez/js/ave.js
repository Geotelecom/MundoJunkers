var actual = [];
actual['.productesblock_homefeatured'] = 1;
actual['.productesblock_bestsellers'] = 1;
actual['.opinionsblock'] = 1;
actual['.productescategoria'] = 1;
actual['.marquesblock'] = 1;

function pasa(direcc, capastotal, capa)
{
    var total = parseInt($(capastotal).length);     
    $(capa+actual[capastotal]).hide();

    if(direcc = 'sig')
    {
        if(actual[capastotal] == total) {
            $(capa+'1').fadeIn();
            actual[capastotal] = 1;             
        } else {
            $(capa+(parseInt(actual[capastotal])+1)).fadeIn();
            actual[capastotal]++;
        }
    }
    else if(direcc == 'ant')
    {
        if(actual[capastotal] == 1) {
            $(capa+total).fadeIn();
            actual[capastotal] = total;             
        } else {
            $(capa+(parseInt(actual[capastotal])-1)).fadeIn();
            actual[capastotal]--;
        }
    }
}


function opiniones() {
    //$('#opiniones').click();
    $('#more_info_tabs li a').removeClass('selected');
    $('#more_info_tabs li a.idTabHrefShort').addClass('selected');

    $('#idTab1').addClass('block_hidden_only_for_screen');
    $('#idTab2').addClass('block_hidden_only_for_screen');
    $('#idTab3').addClass('block_hidden_only_for_screen');
    $('#idTab4').addClass('block_hidden_only_for_screen');
    $('#idTab6').addClass('block_hidden_only_for_screen');
    $('#idTab7').addClass('block_hidden_only_for_screen');
    $('#idTab8').addClass('block_hidden_only_for_screen');
    $('#idTab9').addClass('block_hidden_only_for_screen');
    $('#idTab10').addClass('block_hidden_only_for_screen');
    $('#idTab5').removeClass('block_hidden_only_for_screen');

    
    $.scrollTo( '.opiniones', 1200 );
}