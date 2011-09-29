function startPage()
{
  $$('li')[0].pulsate();
}

function delete_message(id)
{
  url = 'ajax_get.php?d=' + id;
  new Ajax.Request(url, {
    method: 'get',
    onLoading: function() { $('message-'+id).pulsate(); },
    onSuccess: function(transport) {
      if(transport.responseText == id)
      {
        $('message-'+id).shrink();
      }
      else
      {
        alert(id + '!=' + transport.responseText);
      }
    }
  });
}

function ajax_click(url)
{
  url = 'ajax_get.php?c=' + encodeURIComponent(url);
  new Ajax.Request(url, {
    method: 'get',
    onSuccess: function(transport) {
      window.location = transport.responseText;
    }
  });
  return false;
}

function update()
{
  url = 'ajax_get.php?s=' + encodeURIComponent($F('text'));
  new Ajax.Request(url, {
    method: 'get',
    onLoading: function() { $('text').clear(); },
    onSuccess: function(transport) {
      $('messages').insert({ top: transport.responseText });
      $$('li.new')[0].pulsate();
      $$('li.new')[0].removeClassName('new');
    }
  });
}
 
