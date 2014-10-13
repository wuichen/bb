$(function() {
	Dropzone.options.dz = {
	  init: function () {
	    this.on("complete", function (file) {
	      if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
	        location.reload();
	      }
	    });
	  }
	};

})