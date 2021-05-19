$(document).ready(function() {

  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({pageNotFound : 'error_404'}); // initialize

  // define routes
  app.route({view: 'about', load: 'about.html' });
  app.route({view: 'services', load: 'services.html' });
  app.route({view: 'contact', load: 'contact.html' });
  app.route({view: 'home', load: 'home.html' });

  // run app
  app.run();

});

