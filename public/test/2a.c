#include <stdio.h>
#include <stdlib.h>

int PrepareData(int r1,
                int r2,
                int c1,
                int c2,
                int lowerNum,
                int uperNum,
                int randomNumber,
                int i,
                int j,
                int matrixA[10][10],
                int matrixB[10][10],
                int choice)
{
    printf("Enter first row and column as the row and column equal : ");
    scanf("%d", &r1);
    c1 = r1;
    printf("Enter first row and column as the row and column equal : ");
    scanf("%d", &r2);
    c2 = r2;
    //Inserting Random Number to Matrix A
    for (int i = 0; i < r1; ++i)
    {
        for (int j = 0; j < c1; ++j)
        {
            randomNumber = (rand() % (uperNum - lowerNum + 1)) +
                           lowerNum;
            if (i <= j)
            {
                matrixA[i][j] = randomNumber;
            }
            else
            {
                matrixA[i][j] = 0;
            }
        }
    }
    for (int i = 0; i < r2; ++i)
    {
        for (int j = 0; j < c2; ++j)
        {
            randomNumber = (rand() % (uperNum - lowerNum + 1)) +
                           lowerNum;
            if (i <= j)
            {
                matrixB[i][j] = randomNumber;
            }
            else
            {
                matrixB[i][j] = 0;
            }
        }
    }
    printf("\n\nMatrix A : \n");

    for (int i = 0; i < r1; ++i)
    {
        for (int j = 0; j < c1; ++j)
        {
            printf("\t%d", matrixA[i][j]);
        }
        printf("\n");
    }
    printf("\n\nMatrix B : \n");
    for (int i = 0; i < r2; ++i)
    {
        for (int j = 0; j < c2; ++j)
        {
            printf("\t%d", matrixB[i][j]);
        }
        printf("\n");
    }
    printf("\n\n\nEnter to Continue...");
    getch();
A:
    system("cls");
    printf("\n\n\nNow What Task You Want to Perform :\n\t\t1.Multiply\n\t\t2.Transpose\n\t\t3.UpperSum\n\t\t4.EXIT\n\n\nEnter Your Choice : ");
    scanf("%d", &choice);
    switch (choice)
    {
    case 1:
        Multiply(r1, r2, c1, c2, i, j, matrixA, matrixB);
        goto A;
    case 2:
        Transpose(r1, r2, c1, c2, i, j, matrixA, matrixB);
        goto A;
    case 3:
        UpperSum(r1, r2, c1, c2, i, j, matrixA, matrixB);
        goto A;
    case 4:
        system("exit");
        break;
        goto A;
    default:
        printf("\n\nWrong choice");
        goto A;
    }
}

int Multiply(int r1,
             int r2,
             int c1,
             int c2,
             int i,
             int j,
             int matrixA[10][10],
             int matrixB[10][10])
{
    system("cls");
    int result[10][10], k;
    for (int i = 0; i < r1; ++i)
    {
        for (int j = 0; j < c2; ++j)
        {
            result[i][j] = 0;
        }
    }
    for (int i = 0; i < r1; ++i)
    {
        for (int j = 0; j < c2; ++j)
        {
            for (int k = 0; k < c1; ++k)
            {
                result[i][j] += matrixA[i][k] * matrixB[k][j];
            }
        }
    }
    printf("The Multiply of MatrixA and MatrixB is : \n\n\n");
    for (int i = 0; i < r2; ++i)
    {
        for (int j = 0; j < c2; ++j)
        {
            printf("\t\t%d ", result[i][j]);
        }
        printf("\n");
    }
    printf("\n\n\nEnter to Continue...");
    getch();
}

int Transpose(int r1,
              int r2,
              int c1,
              int c2,
              int i,
              int j,
              int matrixA[10][10],
              int matrixB[10][10])
{
    system("cls");
    int transposeA[10][10], transposeB[10][10];
    for (int i = 0; i < r1; ++i)
    {
        for (int j = 0; j < c1; ++j)
        {
            transposeA[j][i] = matrixA[i][j];
        }
    }
    for (int i = 0; i < r1; ++i)
    {
        for (int j = 0; j < c1; ++j)
        {
            transposeB[j][i] = matrixB[i][j];
        }
    }
    printf("Transpose of Matrix A is :\n\n");
    for (int i = 0; i < r2; ++i)
    {
        for (int j = 0; j < c2; ++j)
        {
            printf("\t\t%d ", transposeA[i][j]);
        }
        printf("\n");
    }
    printf("Transpose of Matrix B is :\n\n");
    for (int i = 0; i < r2; ++i)
    {
        for (int j = 0; j < c2; ++j)
        {
            printf("\t\t%d ", transposeB[i][j]);
        }
        printf("\n");
    }
    printf("\n\n\nEnter to Continue...");
    getch();
}

int UpperSum(int r1,
             int r2,
             int c1,
             int c2,
             int i,
             int j,
             int matrixA[10][10],
             int matrixB[10][10])
{
    system("cls");
    int sum1 = 0, sum2 = 0;
    for (i = 0; i < r1; i++)
    {
        for (j = 0; j < c1; j++)
        {
            if (j > i)
            {
                sum1 += matrixA[i][j];
            }
        }
    }
    for (i = 0; i < r2; i++)
    {
        for (j = 0; j < c2; j++)
        {
            if (j > i)
            {
                sum2 += matrixB[i][j];
            }
        }
    }
    printf("The Summation of Upper Triangular Matrix A : %d and Matrix B: %d", sum1, sum2);
    printf("\n\n\nEnter to Continue...");
    getch();
}

void main()
{
    int r1, r2, c1, c2, l = 0, lowerNum = 15, uperNum = 30, randomNumber,
                        i, j, matrixA[10][10], matrixB[10][10], choice;
    //Initialing Prepare Data
    PrepareData(r1, r2, c1, c2, lowerNum, uperNum, randomNumber, i, j,
                matrixA, matrixB, choice);
}
