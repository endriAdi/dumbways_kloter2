//preview image untuk tambah dan ubah data
function previewImage(){
	const foto=document.querySelector('.foto');
	const imgPreview=document.querySelector('.img-preview');

	const oFReader =new FileReader();
	oFReader.readAsDataURL(foto.files[0]);

	oFReader.onload=function(oFReader){
		imgPreview.src=oFReader.target.result;
	};
}