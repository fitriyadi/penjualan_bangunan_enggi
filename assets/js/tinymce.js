$(function() {
  'use strict';

  //Tinymce editor
  if ($("#tinymceExample").length) {
    tinymce.init({
      selector: '#tinymceExample2',
      setup: function (editor) {
        editor.on('change', function (e) {
          editor.save();
        });
      },
      height: 400,
      theme: 'silver',
      plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      image_advtab: true,
      templates: [{
        title: 'Test template 1',
        content: 'Test 1'
      },
      {
        title: 'Test template 2',
        content: 'Test 2'
      }
      ],
      content_css: []
    });
  }  
});

$(function() {
  'use strict';

  //Tinymce editor
  if ($("#tinymceExample").length) {
    tinymce.init({
      selector: '#tinymceExample',
      setup: function (editor) {
        editor.on('change', function (e) {
          editor.save();
        });
      },
      height: 400,
      theme: 'silver',
      plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      image_advtab: true,
      templates: [{
        title: 'Test template 1',
        content: 'Test 1'
      },
      {
        title: 'Test template 2',
        content: 'Test 2'
      }
      ],
      content_css: []
    });
  }  
});

