<?php
namespace Edu\Cnm\Escott15\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__) . "autoload.php");

use Ramsey\Uuid\Uuid;
/**
 * Cross Section of a "Medium" article
 *
 * This is a cross section of what is stored when a user posts an article on Medium.com.
 *
 * @author Erin Scott <erinleeannscott@gmail.com> updated for /~escott15/data-design
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * @version 4.0.0
 * @package Edu\Cnm\DataDesign
 **/
class Article implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;
	/**
	 * id for this article: primary key
	 * @var Uuid $articleID
	 **/
	private $articleId; // these private variables are the state variables 1/21
	/**
	 * this is the profile Id associated with this article: foreign key
	 * @var Uuid $articleProfileId
	 **/
	private $articleProfileId;
	/**
	 * text content of the article
	 * @var string $articleContent
	 **/
	private $articleContent;
	/**
	 * date and time the article was published in a PHP date time object
	 * @var \DateTime $articleDate
	 **/
	private $articleDateTime;
	/**
	 * the title of the article
	 * @var string $articleTitle
	 */
	private $articleTitle;
	/**
	 * constructor for this article
	 *
	 * @param string|Uuid $newArticleId id of this article or null if a new article
	 * @param string|Uuid $newArticleProfileId id of the Profile that sent this article
	 * @param string $newArticleContent string containing actual article data
	 * @param \DateTime string|null $newArticleDateTime, the date and time article was sent or null if set to current date and time
	 * @param string $newArticleTitle string containing title of the article
	 *
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation Documentation on Constructors and Destructors https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newArticleId, $newArticleProfileId, string $newArticleContent, $newArticleDateTime = null, string $newArticleTitle) {
		try {
			$this->setArticleId($newArticleId);
			$this->setArticleProfileId($newArticleProfileId);
			$this->setArticleContent($newArticleContent);
			$this->setArticleDateTime($newArticleDateTime);
			$this->setArticleTitle($newArticleTitle);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for article id
	 *
	 * @return Uuid value of article id
	 **/
	public function getArticleId(): Uuid {
		return ($this->articleId);
	}
	/**
	 * mutator method for article id
	 *
	 * @param Uuid/string $newArticleId new value of article id
	 * @throws \RangeException if $newArticleId is not positive
	 * @throws \TypeError if $newArticleId is not a uuid or string
	 **/
	public function setArticleId($newArticleId) : void {
		try {
			$uuid = self::validateUuid($newArticleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the article id
		$this->articleId = $uuid;
	}
	/**
	 * accessor method for article author's profile id
	 *
	 * @return Uuid value of article author's profile id
	 **/
	public function getArticleProfileId(): Uuid {
		return ($this->articleProfileId);
	}
	/**
	 * mutator method for article author's profile id
	 *
	 * @param string | Uuid $newArticleProfileId new value of article author's profile id
	 * @throws \RangeException if $newProfileId is not positive
	 * @throws \TypeError if $newArticleProfileId is not an integer
	 **/
	public function setArticleProfileId($newArticleProfileId) : void {
		try {
			$uuid = self::validateUuid($newArticleProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the profile id
		$this->articleProfileId = $uuid;
	}
	/**
	 * accessor method for article content
	 *
	 * @return string value of aricle content
	 **/
	public function getArticleContent(): string {
		return ($this->articleContent);
	}
	/**
	 * mutator method for article content
	 *
	 * @param string $newArticleContent new value of article content
	 * @throws \InvalidArgumentException if $enwArticleContent is not a string or insecure
	 * @throws \RangeException if $newArticleContent is > 140 characters (unrealistic, but that is how I build the database)
	 * @throws \TypeError if $newArticleContent is not a string
	 **/
	public function setArticleContent(string $newArticleContent) : void {
		// verify the article content is secure
		$newArticleContent = trim($newArticleContent);
		$newArticleContent = filter_var($newArticleContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleContent) === true) {
			throw(new \InvalidArgumentException("article content is empty or insecure"));
		}
		// verify the article content will fit in the database
		if(strlen($newArticleContent) > 140) {
			throw(new \RangeException("article content is too large"));
		}
		// store the article content
		$this->articleContent = $newArticleContent;
	}
	/**
	 * accessor method for article date
	 *
	 * @return \DateTime value of article date
	 **/
	public function getArticleDateTime(): \DateTime {
		return ($this->articleDateTime);
	}
	/**
	 * mutator method for article date
	 *
	 * @param \DateTime|string|null $newArticleDateTime article date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newArticleDateTime is not a valid object or string
	 * @throws \RangeException if $newArticleDateTime is a date that does not exist
	 **/
	public function setArticleDateTime($newArticleDateTime = null) : void {
		// base case: if the date is null, use the current date and time
		if($newArticleDateTime === null) {
			$this->articleDateTime = new \DateTime();
			return;
		}
		// store the like date using the ValidateDate trait
		try {
			$newArticleDateTime = self::validateDateTime($newArticleDateTime);
		} catch(\InvalidArgumentException | \RangeException $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->articleDateTime = $newArticleDateTime;
	}
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	// organize the state variables into an array:
	public function jsonSerialize() : array {
		$fields = get_object_vars($this);

		$fields["articleId"] = $this->articleId->toString();
		$fields["articleProfileId"] = $this->articleProfileId->toString();
		$fields["articleContent"] = $this->articleContent->toString();
		$fields["articleTitle"] = $this->articleTitle->toString();

		//format the date so that the frontend can consume it
		$fields["articleDateTime"] = round(floatval($this->articleDateTime->format("U.u")) * 1000);
		return($fields);
	}
}