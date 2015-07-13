document.getElementById("uploadBtn").onchange = function() {
    		document.getElementById("uploadFile").value = this.value;
		};

		$(function () {
 			 $('[data-toggle="tooltip"]').tooltip();
		});

		var editor = ace.edit("editor");
		editor.setTheme("ace/theme/monokai");
		editor.getSession().setMode("ace/mode/html");

		$("form#upload_file").submit(function(event) {

		    //disable the default form submission
		    event.preventDefault();

		    //grab all form data  
		    var formData = new FormData($(this)[0]);

		    $.ajax({
		        url: 'upload.php',
		        type: 'POST',
		        data: formData,
		        async: false,
		        cache: false,
		        contentType: false,
		        processData: false,
		        success: function(returndata) {
		            var arr = jQuery.parseJSON(returndata);
		            //console.log(returndata);
		            if(arr['stat'][0] == 'success'){
		            $('#img-name').val(arr['image'][0]);
		            $('#img-width').val(arr['image'][1]);
		            $('#img-height').val(arr['image'][2]);
		            $('#preview-image').attr('src', arr['image'][0]);
		 			$('#preview-image').css('display', 'block');
		            jcrop_api.setImage(arr['image'][0]);
					$('.modal-lg').css('width', parseInt(arr['image'][1]) + 30);
					$('#alert').css('display', 'none');
				}
				else{
					$('#preview-image').css('display', 'none');
					$('#msg').html(arr['stat'][1]);
		 			$('#alert').css('display', 'block');
				}
		        }
		    });

		    return false;
		});

		$('#set-background .btn').click(function() {

		    if ($("#set-background .active").attr('value') != 'transparent') {
		        $('.jcrop-holder').css('background-image', 'url(' + './images/checker.png' + ')');
		    } else {
		        $('.jcrop-holder').css('background-color', '#ffffff');
		        $('.jcrop-holder').css('background-image', 'none');
		    }

		});

		$("form#gerenatecss").on('submit', function(event) {
		    event.preventDefault();

		    var arry = $(this).serializeArray();
		    dataObj = {};

		    $(arry).each(function(i, field) {
		        dataObj[field.name] = field.value;
		    });


		    var s = parseInt(dataObj['zoom']) / 100;
		    var iw = parseInt(dataObj['icon-width']) * s; //icon width 
		    var ih = parseInt(dataObj['icon-height']) * s; // icon height
		    var sw = parseInt(dataObj['img-width']); // sprite width
		    var sh = parseInt(dataObj['img-height']); // sprite height
		    var str = ""; // css to output
		    var n = 1; // initial icon itteration
		    var px = -parseInt(dataObj['icon-sxp'])*s; // icon x cordinate
		    var py = -parseInt(dataObj['icon-syp'])*s; // icon y coordinate
		    var gx = parseInt(dataObj['icon-hgap']) * s; // gap between icons x direction
		    var gy = parseInt(dataObj['icon-vgap']) * s; // gap between icons y direction
		    var cn = dataObj['class_suffix']; //class/id name for css
		    var bsx = sw * s; // css background size width
		    var bsy = sh * s; // css background size height
		    var spname = dataObj['img-name']; // image path on the server
		    var nor = parseInt(dataObj['sprite-row']); // number of rows in the sprite sheet
		    var noc = parseInt(dataObj['sprite-column']); // number of column in sprite sheet
		    var noi = parseInt(dataObj['no_icon']); // number icon to preview

		    str += '<style>\n' + '\t.file-ext{\n' + '\t\tbackground-image: url(' + spname + ');\n' + '\t\t-webkit-background-size: ' + bsx + 'px ' + bsy + 'px;\n' + '\t\tbackground-repeat: no-repeat;\n' + '\t\tfloat: left;\n' + '\t\tmargin:5px;\n' + '\t\twidth: ' + iw + 'px;\n' + '\t\theight: ' + ih + 'px;\n' + '\t\tdisplay: block;\n' + '\t}\n\n' + '\t.file-ext:hover{\n\t\toutline: 5px auto -webkit-focus-ring-color;\n' + '\t\toutline-offset: -2px;\n\t}\n\n';

		    for (var i = 0; i < nor; i++) {

		        for (var j = 0; j < noc; j++) {
		            str += '\t.' + (cn + n) + '{\n';
		            str += '\t\tbackground-position-x: ' + px + 'px;\n' + '\t\tbackground-position-y: ' + py + 'px;\n' + '\t}\n\n';
		            n++;
		            px = px - iw - gx;

		        }
		        px = -dataObj['icon-sxp'];
		        py = py - ih - gy;
		    }
		    str += '</style>\n\n';




		    for (var k = 1; k < (noi + 1); k++) {
		        str += '\t<div style="width:' + (iw + 10) + 'px; float:left; text-align:center;">\n\t\t<i class="file-ext ' + (cn + k) + '"></i>\n\t\t<span class="badge">' + (cn + k) + '</span>\n\t</div>\n\n';
		    }

		    $('#info').html(str);

		    editor.setValue(str);

		    gotocode();

		});

		editor.getSession().on('change', function(e) {

		    $('#info').html(editor.getValue());

		    gotocode();

		});


		function gotocode() {

		    $("#info i").click(function() {
		        //console.log($(this).next().html());
		        var search = '.' + $(this).next().html() + '{';
		        editor.find(search)
		            //editor.gotoLine();
		        editor.selection.getCursor();
		        $("#t_edit").trigger("click");
		    });

		}


		var jcrop_api;

		$('#target').Jcrop({
		    onChange: showCoords,
		    onSelect: showCoords,
		    onRelease: clearCoords

		}, function() {
		    jcrop_api = this;
		});
		$('.jcrop-holder').css('background-color', '#ffffff');
		$('.jcrop-holder').css('outline', '1px solid #cccccc');
		$('#coords').on('change', 'input', function(e) {
		    var x1 = $('#x1').val(),
		        x2 = $('#x2').val(),
		        y1 = $('#y1').val(),
		        y2 = $('#y2').val();
		    jcrop_api.setSelect([x1, y1, x2, y2]);
		});



		// Simple event handler, called from onChange and onSelect
		// event handlers, as per the Jcrop invocation above
		function showCoords(c) {
		    $('#x1').val(c.x);
		    $('#y1').val(c.y);
		    $('#x2').val(c.x2);
		    $('#y2').val(c.y2);
		    var iconinfo = $("#cord .active").attr('value');
		    if (iconinfo == 'icon-size') {
		        $('#icon-width').val(c.w);
		        $('#icon-height').val(c.h);
		    } else if (iconinfo == 'icon-gap') {
		        $('#icon-hgap').val(c.w);
		        $('#icon-vgap').val(c.h);
		    } else if (iconinfo == 'icon-start') {
		        $('#icon-sxp').val(c.w);
		        $('#icon-syp').val(c.h);
		    }

		};

		function clearCoords() {
		    $('#coords input').val('');
		};
