
  $(document).ready(function () {

    // ##################################################################################################################
    // ##### Sample1 - API method #####
    // ##################################################################################################################
    var myColorScheme = {
      navigationbar : {
        background : '#000',
        border : '0px dotted #555',
        color : '#ccc',
        colorHover:'#fff'
      },
      thumbnail : {
        background:'#000',
        border:'1px solid #000',
        labelBackground:'transparent',
        labelOpacity:'0.8',
        titleColor:'#fff',
        descriptionColor:'#eee'
      }
    };
    var myColorSchemeViewer = {
      background:'rgba(1, 1, 1, 0.75)',
      imageBorder:'12px solid #f8f8f8',
      imageBoxShadow:'#888 0px 0px 20px',
      barBackground:'#222',
      barBorder:'2px solid #111',
      barColor:'#eee',
      barDescriptionColor:'#aaa'
    };

    // custom thumbnail hover effect
    function myThumbnailInit($elt, item) {
    }
    function myThumbnailHoverInit($elt, item, data) {
      //$elt.find('.labelDescription').css({'opacity':'0'});

      var $subCon=$elt.find('.subcontainer');
      var th=$elt.outerHeight(true);
      var $iC=$elt.find('.imgContainer');
      var w=$iC.outerWidth(true)/10;
      var h=$iC.outerHeight(true);
      for(var c=0; c<10; c++ ) {
        var s='rect(0px, '+w*(c+1)+'px, '+h+'px, '+w*c+'px)';
        //var $t=$lI.clone().appendTo($subCon).css({'bottom':-(h+c*4), 'clip':s});
        $iC.clone().appendTo($elt.find('.subcontainer')).css({'bottom':0, 'scale':1, 'clip':s, 'left':0, 'position':'absolute'});
        //$t.css({'top':c*2});
      }
      $iC.remove();
    }

    function myThumbnailHover($elt, item, data) {
      //$elt.find('.labelDescription').delay(150)[data.animationEngine]({'opacity':'1'},400);
      //$elt.find('.labelDescription').delay(150).animate({'opacity':'1'},400);
      var w=$elt.find('.imgContainer').outerWidth(true)/10;
      $elt.find('.imgContainer').each(function( index ) {
        $(this)[data.animationEngine]({ 'left':(-w*10)+w*index*3, 'scale':2},20000);
        //console.log( index*w + ' ' + index+ '-'+w );
      });
    }
    function myThumbnailHoverOut($elt, item, data) {
      //$elt.find('.labelDescription').animate({'opacity':'0'},300);
      var h=$elt.find('.labelImage').outerHeight(true);
      var w=$elt.find('.labelImage').outerWidth(true)/10;
      $elt.find('.labelImage').each(function( index ) {
        $(this)[data.animationEngine]({'bottom':-(h+index*4)});
      });
    }

    // custom info button on viewer toolbar
    function myViewerInfo(item, data) {
      alert('Image URL: '+ item.thumbsrc);
    }


    jQuery("#nanoGallery2").nanoGallery({thumbnailWidth:160,thumbnailHeight:160,
      itemsBaseURL:'assets/image/pengaduan',
      thumbnailHoverEffect:[{'name':'scaleLabelOverImage','duration':300},{'name':'borderLighter'}],
      colorScheme:'light',
      locationHash: false,
      thumbnailLabel:{display:true,position:'overImageOnTop', align:'center'},
      viewerDisplayLogo:true,
      thumbnailLabel:{display:true,position:'overImageOnMiddle', align:'center'}
    });


    function fnDemopProcessData(item, kind, sourceData) {
      if( kind == 'picasa' && item.kind == 'image' ) {
        //console.dir(sourceData);
        item.customData.imgOriginalWidth = sourceData.gphoto$width.$t;
        item.customData.imgOriginalHeight = sourceData.gphoto$height.$t;
        var ex = { model: 'na', iso: 'na' }
        if (typeof sourceData.exif$tags !== "undefined"){
          if (typeof sourceData.exif$tags.exif$model !== "undefined" && typeof sourceData.exif$tags.exif$model.$t !== "undefined"){
            ex.model = sourceData.exif$tags.exif$model.$t;
          }
        }
        item.customData.exif = ex;
      }
    }

    function fnDemoViewerInfo( item, data ) {
      var s= 'camera: '+item.customData.exif.model + ' / width: '+item.customData.imgOriginalWidth+' / height: '+item.customData.imgOriginalHeight;
      alert(s);
    }


    jQuery('#btnReload').on('click', function() {
      jQuery('#nanoGallery3a').nanoGallery('reload');
    });
    jQuery('#btnCountSelected').on('click', function() {
      alert(jQuery('#nanoGallery3a').nanoGallery('getSelectedItems').length);
    });
    jQuery('#btnUnselect').on('click', function() {
      var items=jQuery('#nanoGallery3a').nanoGallery('getSelectedItems');
      jQuery('#nanoGallery3a').nanoGallery('unselectItems', items)
    });


    jQuery("#nanoGalleryMLN").nanoGallery({thumbnailWidth:120,thumbnailHeight:120,
      items:contentGalleryMLN,
      //paginationMaxItemsPerPage:3,
      paginationMaxLinesPerPage:1,
//        paginationDots : true,
      paginationVisiblePages: 10,
      thumbnailHoverEffect:'imageInvisible,imageScale150',
      viewerDisplayLogo:true,
      useTags:false,
      locationHash:false,
      breadcrumbAutoHideTopLevel:true,
      maxItemsPerLine:5,
      locationHash: false,
      itemsBaseURL:'demonstration/'
    });

    jQuery('#btnPaginationCount').on('click', function() {
      alert(jQuery('#nanoGalleryMLN').nanoGallery('paginationCountPages'));
    });
    jQuery('#btnPaginationNext').on('click', function() {
      jQuery('#nanoGalleryMLN').nanoGallery('paginationNextPage');
    });
    jQuery('#btnPaginationPrevious').on('click', function() {
      jQuery('#nanoGalleryMLN').nanoGallery('paginationPreviousPage');
    });
    jQuery('#btnPaginationGoto').on('click', function() {
      jQuery('#nanoGalleryMLN').nanoGallery('paginationGotoPage',2);
    });



  });
