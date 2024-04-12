function search() {
    var keyword = document.getElementById("searchInput").value.toLowerCase();
    var divElement = document.getElementById(keyword);
    // Get the value entered in the search input
    var query = document.getElementById('searchInput').value.toLowerCase();
  
    // Define a mapping of keywords to page URLs within the same website
    var keywordMap = {
        'contact': '/contact-us.html',
        'contact us': '/contact-us.html',
        'feedback': '/feedback.html',
        'gallery': '/Our-gallery.html',
        'our gallery': '/Our-gallery.html',
        'our history': '/our-history.html',
        'history': '/our-history.html',
        'team member': '/team-member.html',
        'team members': '/team-member.html',
        'member': '/team-member.html',
        'members': '/team-member.html',
        'building structure': 'Building-Structure.html',
        'water proofing': 'Water-proofing.html',
        'hard landscape': 'Hard-Landscape.html',
        'sewarge system': 'Sewarge-System.html',
        'road work': 'Road-Work.html',
        'electric substation': 'Electric-Substation.html',
        'ms structure work': 'Ms-Structure-Work.html',
        'structure work': 'Ms-Structure-Work.html',
        'external development': 'External-Development.html',
        'projects': 'latest-project.html',
        'project': 'latest-project.html',
        'latest projects': 'latest-project.html',
        'latest project': 'latest-project.html',
        'work': 'latest-project.html',
        'works': 'latest-project.html',
        'main project': 'project.html',
        'home': '/index.html',
        'main': '/index.html',
        'faqs': '/faq.html',
        'faq': '/faq.html',
        'location': '/index.html',
        'about': '/about-us.html',
        'about us': '/about-us.html',
        'vision': '/about-us.html',
        'mission': '/about-us.html',
        'why choose us': '/about-us.html'
        
        // Add more keywords and page URLs as needed
    };
    // Check if the entered query matches any keyword in the mapping
    if (divElement) {
      // Scroll to the div
      divElement.scrollIntoView({ behavior: "smooth" });
    }
    else if (query in keywordMap) {
        // Redirect to the corresponding page URL
        window.location.href = keywordMap[query];
    }
    else if(!(query in keywordMap) && !(divElement)){
      alert('No matching keyword found!');
    }
  }
  var form = document.getElementById("valueForm");
  
    // Add event listener for form submission
    form.addEventListener("submit", function(event) {
      // Prevent the default form submission
      event.preventDefault();
      
      // Get the value from the input field
      var value = document.getElementById("searchInput").value;
      
      // Process the value (for example, log it to the console)
      console.log("Submitted value:", value);
      
      // You can add additional code here to handle the submitted value
    });
  
    // Alternative: Listen for key press events in the input field
    document.getElementById("searchInput").addEventListener("keyup", function(event) {
      // Check if the Enter key (key code 13) was pressed
      if (event.keyCode === 13) {
        // Trigger the form submission
        form.dispatchEvent(new Event("submit"));
      }
    });
  
  