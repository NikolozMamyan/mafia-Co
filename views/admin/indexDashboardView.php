<?php



class DashboardView {
    public function render($data) {
       


        echo '<p>Total d\'utilisateurs <br>' . $data['totalUsers'] . '</p>';
        echo '<p>Total d\'itinéraires <br>' . $data['totalItineraries'] . '</p>';
        echo '<p>Total de messages <br>' . $data['totalMessages'] . '</p>';
        





    }
}
?>
