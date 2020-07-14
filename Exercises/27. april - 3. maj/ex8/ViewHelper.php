<?php

class ViewHelper
{

    //Displays a given view and sets the $variables array into scope.
    public static function render($file, $variables = array())
    {
        // Vzame asoiativno polje in iz tega seznama naredi spremrenljivke
        extract($variables);

        // zazaksnimo delvoanja psianja na standardni izhod. Vsa pisanaj an standardnih izhod ( print, echo) bo zadžano in bo pisalo v nek buffer.
        ob_start();

        // Na stadnarni izhod izpiše datoteko file. Oz v tem primre gr v buffer.
        include($file);

        // shrani vse kr je v bufferju v sprermenljvko.
        $renderedView = ob_get_clean();

        // Izpiše buffer.
        echo $renderedView;
    }

    // Redirects to the given URL
    public static function redirect($url)
    {
        header("Location: " . $url);
    }

    // Displays a simple 404 message
    public static function error404()
    {
        header('This is not the page you are looking for', true, 404);
        $html404 = sprintf("<!doctype html>\n" .
            "<title>Error 404: Page does not exist</title>\n" .
            "<h1>Error 404: Page does not exist</h1>\n" .
            "<p>The page <i>%s</i> does not exist.</p>", $_SERVER["REQUEST_URI"]);

        echo $html404;
    }

    // Displays a simple error message
    public static function error400($message)
    {
        header('A bad request', true, 400);
        $html404 = sprintf(
            "<!doctype html>\n" .
                "<title>Error 400: A bad request</title>\n" .
                "<h1>Error 400: A bad request</h1>\n" .
                "<p>The following error occurred while accessing <i>%s</i>:\n" .
                "<blockquote><pre>%s</pre></blockquote></p>\n",
            $_SERVER["REQUEST_URI"],
            $message
        );

        echo $html404;
    }
}
