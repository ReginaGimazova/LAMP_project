<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 19:48
 */

class Post
{
    private $title;
    private $postContent;
    private $date;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPostContent()
    {
        return $this->postContent;
    }

    /**
     * @param string $postContent
     */
    public function setPostContent($postContent): void
    {
        $this->postContent = $postContent;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }



}