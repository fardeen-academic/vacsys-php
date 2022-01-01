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
    SearchLinear(Arr);
}

int SearchLinear(int Arr[100])
{
    int search, i, n, count = 0;
A:
    printf("Enter a number to search : ");
    scanf("%d", &search);
    for (i = 0; i < n; i++)
    {
        if (Arr[i] == search)
        {
            count++;
            break;
        }
    }
    if (count == 0)
    {
        printf("%d isn't present in the array.\n\nEnter to search again...\n\n\n", search);
        getch();
        goto A;
    }
    else
    {
        printf("\n\n%d is present at location %d.\n", search, i + 1);
    }
    return 0;
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
