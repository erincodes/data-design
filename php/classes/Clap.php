<?php
namespace Edu\Cnm\Escott15\DataDesign;
require_once("autoload.php");
require_once(dirname(__DIR__, ) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * Cross Section of a "Medium" article
 *
 * This is a cross section of what is stored when a user claps (likes) an article on Medium.com.
 *
 * @author Erin Scott <erinleeannscott@gmail.com> updated for /~escott15/data-design
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * @version 4.0.0
 * @package Edu\Cnm\DataDesign
 **/

// The JsonSerializable is when you agree to implement the contract. JsonSerialize saves you the time of writing out the JSON code.
class Clap implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;
	/**
	 * id of the article that this clap is for; this is a primary key
	 * @var Uuid $clapId
	 **/
	private $clapId;
	/**
	 * id of the article that this clap is for; this is a foreign key
	 * @var Uuid $clapArticleId
	 **/
	private $clapArticleId;
	/**
	 * id of the Profile that sent this clap; this is a foreign key
	 * @var Uuid $clapProfileId
	 **/
	private $clapProfileId;

	 // I don't currently have clapDate on my ERD, may need to add it. Commenting out this portion of doc block and state variable for now. 1/23/18
	// /**
	 // * date and time this clap was sent, in a PHP DateTime object
	// * @var \DateTime $clapDate
	// **/
		// private $clapDate;
	/**
	 * constructor for this clap
	 *
	 * @param string|Uuid $newClapId id of this clap or null if a new clap
	 * @param string|Uuid $newClapArticleId id of the article that was clapped
	 * @param string|Uuid $newClapProfileId id of the profile that clapped the article
	 *
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation Documentation on Constructors and Destructors https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newClapId, $newClapArticleId, $newClapProfileId) {
		try {
			$this->setClapId($newClapId);
			$this->setClapArticleId($newClapArticleId);
			$this->setClapProfileId($newClapProfileId);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for clap id
	 *
	 * @return Uuid value of clap id
	 **/
	public function getClapId() : Uuid{
		return($this->clapId);
	}
	/**
	 * mutator method for clap id
	 *
	 * @param int|Uuid $newClapId new value of clapId
	 * @throws \RangeException if $newClapId is not positive
	 * @throws \TypeError if data types violate type hints
	 **/
	public function setClapId($newClapId) : void {
		try {
			$uuid = self::validateUuid($newClapId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the clap id
		$this->clapId = $uuid;
	}

	/**
	 * accessor method for clap article id
	 *
	 * @return Uuid value of clap article id
	 **/
	public function getClapArticleId() : Uuid{
		return($this->clapArticleId);
	}
	/**
	 * mutator method for clap article id
	 *
	 * @param string | Uuid $newClapArticleId new value of clap article id
	 * @throws \RangeException if $newClapArticleId is not positive
	 * @throws \TypeError if data types violate type hints
	 **/
	public function setClapArticleId($newClapArticleId) : void {
		try {
			$uuid = self::validateUuid($newClapArticleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the profile id
		$this->clapArticleId = $uuid;
	}
	/**
	 * accessor method for clap profile id
	 *
	 * @return Uuid value of clap profile id
	 **/
	public function getClapProfileId() : Uuid{
		return($this->clapProfileId);
	}
	/**
	 * mutator method for clap profile id
	 *
	 * @param string|Uuid $newClapProfileId new value of clap profile id
	 * @throws \RangeException if $newClapProfileId is not positive
	 * @throws \TypeError if data types violate type hints
	 **/
	public function setClapProfileId($newClapProfileId) : void {
		try {
			$uuid = self::validateUuid($newClapProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the profile id
		$this->clapProfileId = $uuid;
	}

	// I don't currently have clapDate on my ERD, may need to add it. Commenting out accessor method for now. 1/23/18
	// /**
	 // * accessor method for clap date
	 // *
	// * @return \DateTime value of clap date
	// **/
	// public function getClapDate() : \DateTime {
	// return($this->clapDate);
	// }

// I don't currently have clapDate on my ERD, may need to add it. Commenting out mutator method for now. 1/23/18
	// /**
	 // * mutator method for clap date
	 // *
	 // * @param \DateTime|string|null $newClapDate clap date as a DateTime object or string (or null to load the current time)
	 // * @throws \InvalidArgumentException if $newClapDate is not a valid object or string
	 // * @throws \RangeException if $newClapDate is a date that does not exist
	 // **/
	// public function setClapDate($newClapDate = null) : void {
		// // base case: if the date is null, use the current date and time
		// if($newClapDate === null) {
			// $this->clapDate = new \DateTime();
			// return;
		// }
		// // store the like date using the ValidateDate trait
		// try {
			// $newClapDate = self::validateDateTime($newClapDate);
		// } catch(\InvalidArgumentException | \RangeException $exception) {
			// $exceptionType = get_class($exception);
			// throw(new $exceptionType($exception->getMessage(), 0, $exception));
		// }
		// $this->clapDate = $newClapDate;
	// }
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	// organize the state variables into an array:
	public function jsonSerialize() : array {
		$fields = get_object_vars($this);

		$fields["clapId"] = $this->clapId->toString();
		$fields["clapArticleId"] = $this->clapArticleId->toString();
		$fields["clapProfileId"] = $this->clapProfileId->toString();

		//format the date so that the frontend can consume it
		// I don't currently have a date attribute relating to the profile entity in my ERD, so I'm commenting the following code out for now. 1/23/18
		// $fields["articleDateTime"] = round(floatval($this->articleDateTime->format("U.u")) * 1000);
		return($fields);
	}
}