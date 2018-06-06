//Image manage file upload preview //
function image(){
	this.inputid 		= '',
	this.previewid 		= '',
	this.imagewidth 	= '',
	this.imageheight 	= '',
		
	this.preview = function(){
		console.log('upload preview');
		var _this = this;
		var input 	= _this.inputid[0];
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
			_this.previewid.html('<img src="' + e.target.result + '" '
								+ ( _this.imagewidth != '' ? 'width="' + _this.imagewidth +'" ' : '')
								+ ( _this.imageheight != '' ? 'height="' + _this.imageheight + '" ' : '') 
								+ ' />');

			};
			reader.readAsDataURL(input.files[0]);
			//console.log(reader);
		}else{
			_this.previewid.html('<img src="' + _base + '/public/images/no-image.svg" width="' + _this.imagewidth +'" height="' + _this.imageheight +'" />');
		}
	};
	
	this.inputclick = function(){
		var _this = this;
		_this.inputid.on('change',function(){
			var allow 		= 	$(this).attr('data-allow').split('|');
			var permiss		=	0; // เงื่อนไขไฟล์อนุญาต		
			permiss_file	=	$(this).val();
			permiss_file	=	permiss_file.toLowerCase();    
			if(permiss_file !=	""){
				for(i=0;i<allow.length;i++){ // วน Loop ตรวจสอบไฟล์ที่อนุญาต   
					if(permiss_file.lastIndexOf(allow[i])>=0){  // เงื่อนไขไฟล์ที่อนุญาต   
						permiss=1;
						break;
					}else{
						continue;
					}
				}
			}
			//name = _this.inputid[0];
			if(permiss==0){
					alert("Please Upload file type "+ allow + " Only");
					_this.inputid.val('');
					_this.previewid.html('');
				return false;   
			}
			_this.preview();
		});
	}
	
}