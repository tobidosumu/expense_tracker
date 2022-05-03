<?php require_once "./require/dbConnect.php";

Expense::$dbConn = $dbConn;

class Expense
{
    // properties
    public static $dbConn;
    private $id;
    private $expNarrate;
    private $expCategory;
    private $expAmount;
    private $expDate;
    private static $expenses = [];

    // methods
    public function __construct($expNarrate, $expCategory, $expAmount, $expDate = null) 
    {   
        $this->id = count(self::$expenses) + 1;
        $this->expNarrate = $expNarrate;
        $this->expCategory = $expCategory;
        $this->expAmount = $expAmount;
        $this->expDate = $expDate;
        self::$expenses[] = $this;
    }

    //saves expense to database
    public static function createExpense($narration, $category, $amount)
    {

       self::$dbConn->query("INSERT INTO expenses (expNarrate, expCategory, expAmount) VALUES ('$narration', '$category', '$amount')");

    }

    //checks against empty fields
    public static function checkEmptyNarrate($narration, $catName, $amount) 
    {
        $result = mysqli_num_rows(self::$dbConn->query("SELECT catName FROM categories WHERE catName = '$catName'"));
        
        if (empty($narration && $catName || $amount)) {

            return "Please fill up the fields.";

        } elseif (empty($narration)) {

            return "Please enter an expense narration.";

        } elseif ($result < 1) {
    
            return "Please select a category.";
            
        } elseif (empty($amount)) {

            return "Please enter an expense amount.";

        } else {
             
            return self::createExpense($narration, $catName, $amount)."<h6 class='text-success'>" ."Expense is successfully added!". "</h6>";

        }
    }

    //fetches expense from db
    private static function fetchExpenses()
    {
        $result = self::$dbConn->query("SELECT * from expenses");

        if ($result->num_rows > 0) {

            foreach ($result as $expense) {
                
                new Expense($expense['expNarrate'], $expense['expCategory'], $expense['expAmount'], $expense['expDate']);
           
            }
        }
        
    }

    //gets expenses
    public static function getExpenses()
    {
        self::fetchExpenses();
        return self::$expenses;
    }

    //returns expense id
    public function getId()
    {
        return $this->id;
    }

    //returns expense narration
    public function getExpNarrate()
    {
        return $this->expNarrate;
    }

    //returns expense category
    public function getExpCategory()
    {
        return $this->expCategory;
    }

    //returns expense amount
    public function getExpAmount()
    {
        return $this->expAmount;
    }

    //returns date and time of expense enrty
    public function getExpDate()
    {
        return $this->expDate;
    }

    public function setExpNarrate($expNarrate)
    {
        $this->expNarrate = $expNarrate;
    }

    public function setExpCategory($expCategory) 
    {
        $this->expCategory = $expCategory;
    }

    public function setExpAmount($expAmount)
    {
        $this->expAmount = $expAmount;
    }

    public function SetExpDate($expDate) 
    {
        $this->expDate = $expDate;
    }


    //inserting data into db
    public function insertData()
    {
        try {
            $stmt = $this->dbConn->query("INSERT INTO expenses(id,expNarrate,expCategory,expAmount,expDate)
            VALUES (?,?,?,?,?)");
            $stmt->execute($this->id,$this->expNarrate,$this->expCategory,$this->expAmount,$this->expDate);
            echo "data inserted successfully!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fetchData() 
    {
        try {
            $stmt = $this->dbConn->prepare("SELECT * FROM expenses");
            $stmt->execute();
            return $stmt->fetchData;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fetchOne() 
    {
        try {
            $stmt = $this->dbConn->prepare("SELECT FROM expenses where id=?");
            $stmt->$this->execute([$this->id]);
            return $stmt->fetchData();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

