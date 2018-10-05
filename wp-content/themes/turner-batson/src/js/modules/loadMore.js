import $ from 'jquery';
import { dom } from './dom';
import withDefault from './withDefault';
import { attrToBool } from './attr';

export default function loadMore(context, options) {
  const button = dom('[data-load-more-button]', context);
  const page = parseInt(withDefault('2', 'loadPage', button.dataset));

  button.addEventListener('click', function(e) {
    const loading = attrToBool(button, 'loadPageLoading');
    if (!loading) {
      button.setAttribute('data-load-more-loading', true);
      var data = {
        action: options.action,
        nonce: options.nonce,
        page: page,
        query: options.query,
      };

      $.post(options.url, data, function(res) {
        if (res.success) {
          // Append markup
          $(`${context} [data-load-more-container]`).append(res.data.markup);
          // Update button
          if (res.data.isLast) {
            button.classList.add('hidden');
            button.setAttribute('data-load-more-loading', false);
          } else {
            button.setAttribute('data-load-page', page + 1);
            button.setAttribute('data-load-more-loading', false);
          }
        } else {
          button.setAttribute('data-load-more-loading', false);
          console.log(res);
        }
      }).fail(function(xhr) {
        button.setAttribute('data-load-more-loading', false);
        console.log(`Failed with message of: ${xhr.responseText}`);
      });
    }
  });
}
