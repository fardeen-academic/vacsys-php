#include<stdio.h>
void sort_element(int arr[], int n)
{
    int i;
    if(n>0)
    {
        for (i = 0; i < n; i++)
            if (arr[i]>=arr[n - 1])
        {
            swap_Element(arr,i,n-1);
        }

           sort_element(arr, n - 1);
        }

    }

int swap_Element(int arr[],int i,int j)
{
         int temp=arr[j];
         arr[j]=arr[i];
         arr[i]=temp;
}

void printArr(int arr[], int n)
{
    int i;
    for (i=0; i < n; i++)
        printf("%d ", arr[i]);
}
int main()
{
    int n,j;
    printf("Enter your array size:");
    scanf("%d",&n);
    int arr[n];
    printf("Enter the Array Element:");
    for(j=0;j<n;j++)
    {
        scanf("%d",&arr[j]);
    }
    sort_element(arr,n);
    printf("After ascending order sort Array Elements are:");
    printArr(arr, n);
    return 0;
}