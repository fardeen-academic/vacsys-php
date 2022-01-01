#include <stdio.h>

void CopyString(char String_A[], char String_B[])
{
    char *A = String_A;
    char *B = String_B;
    while (*A != '\0')
    {
        *B++ = *A++;
        *B = '\0';
    }
    printf("\n\n\nAfter Copy String A to B now B String is : \n\n");
    puts(String_B);
    return 0;
}

void ConcatString(char String_A[], char String_B[])
{
    char *a = String_A;
    char *b = String_B;
    while (*a)
    {
        a++;
    }
    while (*b)
    {
        *a = *b;
        b++;
        a++;
    }
    *a = '\0';
    printf("\n\n\nThe Concatenate String is : \n\n");
    puts(String_A);
    return 0;
}

void CompString(char String_A[], char String_B[])
{
    int flag = 0;
    char *a = String_A;
    char *b = String_B;
    while (*a != '\0' && *b != '\0')
    {
        if (*a != *b)
        {
            flag = 1;
        }
        a++;
        b++;
    }
    if (flag == 0)
    {
        printf("String_A and String_B are Equal\n\n");
    }
    else
    {
        printf("String_A and String_B are Not Equal\n\n");
    }
}

void RevString(char String_B[])
{
    int lengthStr, i;
    char *begin_ptr, *end_ptr, ch;
    char *str = String_B;
    lengthStr = strlen(str);
    begin_ptr = str;
    end_ptr = str;
    for (i = 0; i < lengthStr - 1; i++)
        end_ptr++;
    for (i = 0; i < lengthStr / 2; i++)
    {
        ch = *end_ptr;
        *end_ptr = *begin_ptr;
        *begin_ptr = ch;
        begin_ptr++;
        end_ptr--;
    }
    printf("Reverse of the string: %s\n", str);
}

int main()
{
    char String_A[1000], String_B[1000];
    int choice;
    printf("Enter For String_A : ");
    gets(String_A);
    printf("Enter For String_B : ");
    gets(String_B);
    printf("\t\t\n1.Copy String A to B\t\t\n2.Concatenate String A and B\t\t\n3.Compare String A and B\t\t\n4.Reverse String");
    printf("\n\nEnter Your choice : ");
    scanf("%d", &choice);
A:
    switch (choice)
    {
    case 1:
        CopyString(String_A, String_B);
        break;
    case 2:
        ConcatString(String_A, String_B);
        break;
    case 3:
        CompString(String_A, String_B);
        break;
    case 4:
        RevString(String_B);
        break;
    default:
        goto A;
    }
    return 0;
}
