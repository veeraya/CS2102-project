<?php
class CommentModel extends CI_Model {

    public function __construct(){
        $this->load->database();
        $this->load->model('ReviewModel');
    }

    public function create($reviewUrl){
        $review = $this->ReviewModel->getReviewByUrl($reviewUrl);
        $content =  $this->input->post($reviewUrl.'_content');
        $userEmail = $this->session->userdata['email'];
        $restaurantName =  $review['restaurant_name'];
        $restaurantPostalCode =   $review['restaurant_postal_code'];
        $reviewUpdatedOn = $review['updated_on'];
        $reviewUserEmail = $review['user_email'];

        $queryString = "INSERT INTO comments (content, user_email, restaurant_name, restaurant_postal_code, review_updated_on, review_user_email) VALUE(?,?,?,?,?,?)";
        $this->db->query($queryString, array($content, $userEmail, $restaurantName, $restaurantPostalCode, $reviewUpdatedOn, $reviewUserEmail));
    }

    public function getCommentsByReviewUrl($reviewUrl){
        $review = $this->ReviewModel->getReviewByUrl($reviewUrl);
        $reviewUserEmail = $review['user_email'];
        $restaurantName =  $review['restaurant_name'];
        $restaurantPostalCode =   $review['restaurant_postal_code'];
        $reviewUpdatedOn = $review['updated_on'];

        $queryString = "SELECT * FROM comments WHERE review_user_email = ? AND restaurant_name = ? AND restaurant_postal_code = ? AND review_updated_on = ?";
        $query = $this->db->query($queryString, array($reviewUserEmail, $restaurantName, $restaurantPostalCode, $reviewUpdatedOn));
        return $query->result_array();
    }


    public function delete($restaurantName, $restaurantPostalCode, $name){
        $queryString = "DELETE FROM menu WHERE restaurant_name = ? AND restaurant_postal_code = ? AND name = ?";
        $query = $this->db->query($queryString, array($restaurantName, $restaurantPostalCode, $name));
    }
}
 ?>