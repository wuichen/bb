$(function() {
	Dropzone.options.filedrop = {
	  init: function () {
	    this.on("complete", function (file) {
	      if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
	        alert("done!");
	      }
	    });
	  }
	};
})