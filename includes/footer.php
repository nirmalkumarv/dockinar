  <div class="container">
      <!-- Example row of columns -->
     <?php if($_GET["p"]=="main" || !isset($_GET["p"])) { ?><div class="">
        <div class="col-md-4">
          <h2>For Organizers</h2>
          <p>Are you a Webinar organizer?. Showcase your events in Dockinars and reach wide audience </p>
          <p><a class="btn btn-default" href="?p=organizer" role="button">More Info..&raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>For Speakers</h2>
          <p>Are you frequent Webinar Presenter?. Keep your profile in Dockinar and can be linked to multiple webinars</p>
          <p><a class="btn btn-default" href="?p=speaker" role="button">More Info  &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Developers</h2>
          <p>Dockinar helps developers to create application using API</p>
          <p><a class="btn btn-default" href="?p=developer" role="button">More info.. &raquo;</a></p>
        </div>
      </div>
	 <?php }?>
      <hr>

      <footer>
        <p class="text-center">&copy; Dockinar 2015</p>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
