(function($) {
  'use strict';

  const DEV_QUOTES = {};
  DEV_QUOTES.getAjax = function() {
    $.ajax({
      method: 'get',
      dataType: 'json',
      url:
        quotes.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
       fail: function(){
          alert('Request failed')
       }
    }).done(function(post) {

      $('.quote-content').html(post[0].content.rendered);
      const sourceUrl = post[0]._qod_quote_source_url;
      const source = post[0]._qod_quote_source;
      if (sourceUrl) {
        $('.quote-title').append(`, <a href="${sourceUrl}">${source}</a>`);
      } else if (source) {
        $('.quote-title').append(', ' + source);
      } else {
        $('.quote-title').html(post[0].title.rendered);
      }

      history.pushState(null, null, '/dev-quotes/' + post[0].slug);
    });
  };

  DEV_QUOTES.submitQuotes = function() {
    const submitAuthor = $('#submit-author').val();
    const submitQuote = $('#submit-quotes').val();
    const submitSource = $('#submit-place').val();
    const submitSourceUrl = $('#submit-url').val();

    $.ajax({
      method: 'POST',
      url: quotes.rest_url + 'wp/v2/posts',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', quotes.wpapi_nonce);
      },
      data: {
        title: submitAuthor,
        content: submitQuote,
        expcerpt: submitQuote,
        _qod_quote_source: submitSource,
        _qod_quote_source_url: submitSourceUrl,
        post_status: 'draft'
      },
     fail: function(){
      $('#submitform').append('<p>Something went wrong! Sorry!</p>');
     }
    }).done(function(response) {
      //show success 
      $('#submitform')[0].reset();
      $('#submitform').append('<p>Successfully submitted. Please wait for the approval.</p>');
    });
  };

  // When the button is clicked
  $('.quotes-btn').on('click', function(e) {
    e.preventDefault();
    DEV_QUOTES.getAjax();
  });

  $('#quote_submit').on('click', function(e) {
    e.preventDefault();
    DEV_QUOTES.submitQuotes();
  });

  $(window).on('popstate', function() {
    window.location.reload();
  });
})(jQuery);
