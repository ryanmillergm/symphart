<?php
  namespace App\Controller;

  use Symfony\Component\HttpFoundation\Response;

  Class ArticleController {
    public function index() {
      return new Response('<html><body>Hello</body></html>');
    }
  }
?>
