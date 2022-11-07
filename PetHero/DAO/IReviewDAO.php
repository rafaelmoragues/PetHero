<?php
    namespace DAO;

    use Models\Review as Review;
    use DAO\Connection as Connection;

    interface IReviewDAO
    {
        function Add(Review $Review);
    }
?>