#include <stdio.h>
#include <stdlib.h>
#include <time.h>
int PrepareData(int Arr[100], int lengtharr)
{
    int randomNumber, lowerNum = 51, uperNum = 160, i;
    srand(time(NULL));
    for (int i = 0; i < lengtharr; ++i)
    {
        randomNumber = (rand() % (uperNum - lowerNum + 1)) + lowerNum;
        Arr[i] = randomNumber;
    }
    DisplayFun(Arr, lengtharr);
    SearchBinary(Arr, lengtharr);
}

int SearchBinary(int Arr[100], int lengtharr)
{
    int step, i, temp, size, search, result = 0, low, high, mid;
    //The Binary Search Doesn't work Without Short Data
    //That's why we are applying here bubble short
    size = lengtharr;
    for (step = 0; step < size - 1; ++step)
    {
        for (i = 0; i < size - step - 1; ++i)
        {
            if (Arr[i] > Arr[i + 1])
            {
                temp = Arr[i];
                Arr[i] = Arr[i + 1];
                Arr[i + 1] = temp;
            }
        }
    }
    printf("Your Array After Shorting : \n\n\t");
    for (int i = 0; i < size; ++i)
    {
        printf("%d ", Arr[i]);
    }
    printf("\n\n\n");
    //The Binary Search
    printf("Enter Your Number To Search with Binary Search : ");
    scanf("%d", &search);
    low = 0;
    high = lengtharr - 1;
    mid = (low + high) / 2;
    while (low <= high)
    {
        if (Arr[mid] < search)
            low = mid + 1;
        else if (Arr[mid] == search)
        {
            printf("\n\n\t%d found at location %d\n\n", search, mid + 1);
            break;
        }
        else
            high = mid - 1;
        mid = (low + high) / 2;
    }
    if (low > high)
        printf("Not found! %d isn't present in the list", search);
}

int DisplayFun(int Arr[100], int lengtharr)
{
    int i;
    printf("Your Array Is : \n\n\t");
    for (int i = 0; i < lengtharr; ++i)
    {
        printf("%d ", Arr[i]);
    }
    printf("\n\n");
}

void main()
{
    int Arr[100], lengtharr;
    printf("Enter The Length of Array : ");
    scanf("%d", &lengtharr);
    clock_t t;
    t = clock();
    PrepareData(Arr, lengtharr);
    t = clock() - t;
    double time_taken = ((double)t) / CLOCKS_PER_SEC;
    printf("The Execution time is : %f \n", time_taken);
}
