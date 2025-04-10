<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/Funcoes.php';

/**
 * Test suite for Funcoes utility class
 */
class FuncoesTest extends TestCase
{
    /**
     * Test cases for isEven function
     */
    public function testIsEvenWithEvenNumber()
    {
        // Test with positive even number
        $this->assertTrue(Funcoes::isEven(2));
        $this->assertTrue(Funcoes::isEven(10));
        $this->assertTrue(Funcoes::isEven(100));
        
        // Test with zero (also even)
        $this->assertTrue(Funcoes::isEven(0));
        
        // Test with negative even number
        $this->assertTrue(Funcoes::isEven(-4));
    }
    
    public function testIsEvenWithOddNumber()
    {
        // Test with positive odd number
        $this->assertFalse(Funcoes::isEven(1));
        $this->assertFalse(Funcoes::isEven(15));
        $this->assertFalse(Funcoes::isEven(99));
        
        // Test with negative odd number
        $this->assertFalse(Funcoes::isEven(-7));
    }
    
    /**
     * Test cases for factorial function
     */
    public function testFactorialWithValidInput()
    {
        // Test basic factorial calculations
        $this->assertEquals(1, Funcoes::factorial(0));
        $this->assertEquals(1, Funcoes::factorial(1));
        $this->assertEquals(2, Funcoes::factorial(2));
        $this->assertEquals(6, Funcoes::factorial(3));
        $this->assertEquals(24, Funcoes::factorial(4));
        $this->assertEquals(120, Funcoes::factorial(5));
    }
    
    public function testFactorialWithNegativeInput()
    {
        // Test with negative input (should throw exception)
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Negative number not allowed');
        Funcoes::factorial(-1);
    }
    
    /**
     * Test cases for isPalindrome function
     */
    public function testIsPalindromeWithValidPalindromes()
    {
        // Test with simple palindromes
        $this->assertTrue(Funcoes::isPalindrome('radar'));
        $this->assertTrue(Funcoes::isPalindrome('level'));
        $this->assertTrue(Funcoes::isPalindrome('deified'));
        
        // Test with palindrome phrases (spaces and punctuation should be ignored)
        $this->assertTrue(Funcoes::isPalindrome('A man, a plan, a canal: Panama'));
        $this->assertTrue(Funcoes::isPalindrome('No lemon, no melon'));
        
        // Test with palindrome with mixed case
        $this->assertTrue(Funcoes::isPalindrome('Madam'));
        
        // Test with single character (always a palindrome)
        $this->assertTrue(Funcoes::isPalindrome('a'));
        
        // Test with empty string (technically a palindrome)
        $this->assertTrue(Funcoes::isPalindrome(''));
    }
    
    public function testIsPalindromeWithNonPalindromes()
    {
        // Test with non-palindromes
        $this->assertFalse(Funcoes::isPalindrome('hello'));
        $this->assertFalse(Funcoes::isPalindrome('world'));
        $this->assertFalse(Funcoes::isPalindrome('php unit'));
        $this->assertFalse(Funcoes::isPalindrome('testing'));
    }
    
    /**
     * Test cases for fahrenheitToCelsius function
     */
    public function testFahrenheitToCelsiusWithValidInputs()
    {
        // Test common known conversion values with small delta for floating point precision
        $this->assertEqualsWithDelta(0, Funcoes::fahrenheitToCelsius(32), 0.001);
        $this->assertEqualsWithDelta(100, Funcoes::fahrenheitToCelsius(212), 0.001);
        $this->assertEqualsWithDelta(37, Funcoes::fahrenheitToCelsius(98.6), 0.001);
        
        // Test with negative Fahrenheit (below freezing)
        $this->assertEqualsWithDelta(-17.78, Funcoes::fahrenheitToCelsius(0), 0.01);
        
        // Test with negative Celsius result
        $this->assertEqualsWithDelta(-40, Funcoes::fahrenheitToCelsius(-40), 0.001);
    }
    
    /**
     * Test cases for calculateDiscount function
     */
    public function testCalculateDiscountWithValidInputs()
    {
        // Test with 0% discount (should return original price)
        $this->assertEquals(100, Funcoes::calculateDiscount(100, 0));
        
        // Test with 100% discount (should return 0)
        $this->assertEquals(0, Funcoes::calculateDiscount(100, 100));
        
        // Test with common discount percentages
        $this->assertEquals(90, Funcoes::calculateDiscount(100, 10));
        $this->assertEquals(75, Funcoes::calculateDiscount(100, 25));
        $this->assertEquals(50, Funcoes::calculateDiscount(100, 50));
        
        // Test with decimal price
        $this->assertEquals(45.5, Funcoes::calculateDiscount(65, 30));
    }
    
    public function testCalculateDiscountWithNegativePrice()
    {
        // Test with negative price (should throw exception)
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Negative values not allowed');
        Funcoes::calculateDiscount(-100, 10);
    }
    
    public function testCalculateDiscountWithNegativePercent()
    {
        // Test with negative percentage (should throw exception)
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Negative values not allowed');
        Funcoes::calculateDiscount(100, -10);
    }
    
    public function testCalculateDiscountWithBothNegative()
    {
        // Test with both negative values (should throw exception)
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Negative values not allowed');
        Funcoes::calculateDiscount(-100, -10);
    }
}
