chrome.runtime.onMessageExternal.addListener(
  function(request, sender, sendResponse) {
    if (request.openUrlInEditor) {
      // Close previous opened ones
      chrome.storage.local.get(['openedIds'], function(result) {
        console.log('Value currently is ' + result.key);
      });
      console.log('por')
      // Open new ones and save them
      var openedIds = []
      for (var link of request.openUrlInEditor) {
        chrome.tabs.create({ url: link.url }, function(tab) { openedIds.push(tab.id) });
      }
      console.log('test', openedIds);
      chrome.storage.local.set({r: openedIds}, function(){
        chrome.storage.local.get("r", function(st){
          console.log("post: " + st.r);
          for (var id of result.key) {
            chrome.tabs.remove({ id: id });
          }
        });
      });

    }
  });
