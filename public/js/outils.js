function finish(id, item, action)
{
  $.ajax({
    url: '/finish',
    type: 'get',
    data:{'id':id, 'item':item, 'action': action},
    dataType: 'json',
    success: function(response)
    {
      //var taille = response['data'].length;
      donnees = response;
      if (donnees !='')
      {
        Promise.resolve(window.location.reload()).then(() => alert(donnees));
      }
    }
  });
}
