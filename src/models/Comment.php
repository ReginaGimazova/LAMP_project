<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 19:48
 */

class Comment
{
    private $commentContent;
    private $date;

    /**
     * @return string
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * @param string $commentContent
     */
    public function setCommentContent($commentContent): void
    {
        $this->commentContent = $commentContent;
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